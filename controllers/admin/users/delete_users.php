<?php

include "../../database.php"; // Assuming you have this file
include "../../utils/utils.php";
include "../../../models/clubs.php";
include "../../../models/users.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$user_id = $_SESSION['user_id'];
$club_id = filter_input(INPUT_POST, 'user_id_', FILTER_SANITIZE_NUMBER_INT);

echo $club_id;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {
    $db = new Database();
    $pdo = $db->pdo;
    $users = new Users($db);

    try {
        // Ensure autocommit is off
        $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);

        $pdo->beginTransaction();

        $delete_result = $users->delete($club_id);

        $pdo->commit();
        $success = "Transaction was successful";
        header("Location: ../../../views/admin/users.php?success=" . urlencode($success));
        exit();

    } catch (PDOException $e) {
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
            $error = "Transaction rolled back due to PDOException: " . $e->getMessage();
            echo $error;
            header("Location: ../../../views/admin/users.php?error=" . urlencode($error));
            exit();
        }
    } catch (Exception $e) {
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
        $error = "Transaction failed: " . $e->getMessage();
        echo $error;
        header("Location: ../../../views/admin/users.php?error=" . urlencode($error));
        exit();
    } finally {
        // Ensure autocommit is back to normal
        $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 1);
    }
}
