document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('form').addEventListener('submit', sendMail);
});

function sendMail(event) {
    event.preventDefault(); // Prevent form from submitting

    var params = {
        name: document.querySelector("input[name='name']").value, // Getting value of name field
        email: document.querySelector("input[name='email']").value, // Getting value of email field
        phone: document.querySelector("input[name='phone']").value, // Getting value of phone field
        message: document.querySelector("textarea[name='message']").value // Getting value of message field
    };

    const serviceID = "service_io38cse";
    const templateID = "template_e033xgt";

    emailjs.send(serviceID, templateID, params)
    .then(
        res => {
            // Clearing form fields after successful email send
            document.querySelector("input[name='name']").value = "";
            document.querySelector("input[name='email']").value = "";
            document.querySelector("input[name='phone']").value = "";
            document.querySelector("textarea[name='message']").value = "";

            // Logging response and showing success alert
            console.log(res);
            alert("Your Message Sent Successfully");
        }
    )
    .catch(err => console.log(err)); // Logging any errors
}