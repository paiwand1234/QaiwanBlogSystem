<?php

include "../../database.php"; // Assuming you have this file
include "../../utils/utils.php";
include "../../../models/clubs.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$user_id = $_SESSION['user_id'];
$club_id = filter_input(INPUT_POST, 'club_id', FILTER_SANITIZE_NUMBER_INT);

echo $club_id;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {
    $db = new Database();
    $pdo = $db->pdo;
    $clubs = new Clubs($db);

    try {
        // Ensure autocommit is off
        $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);

        $pdo->beginTransaction();

        $read_result = $clubs->read($club_id);
        $delete_result = $clubs->delete($club_id);

        if ($read_result && $delete_result) {
            echo $read_result['image'];
            if (handle_file_delete("../".$read_result['image'])) {
                echo "\nFile Deleted successfully\n";
            } else {
                throw new Exception("Failed to delete the file.");
            }
        }

        $pdo->commit();
        $success = "Transaction was successful";
        header("Location: ../../../views/admin/clubs.php?success=" . urlencode($success));
        exit();
    } catch (PDOException $e) {
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
            $error = "Transaction rolled back due to PDOException: " . $e->getMessage();
            echo $error;
            header("Location: ../../../views/admin/clubs.php?error=" . urlencode($error));
            exit();
        }
    } catch (Exception $e) {
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
        $error = "Transaction failed: " . $e->getMessage();
        echo $error;
        header("Location: ../../../views/admin/clubs.php?error=" . urlencode($error));
        exit();
    } finally {
        // Ensure autocommit is back to normal
        $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 1);
    }
}
