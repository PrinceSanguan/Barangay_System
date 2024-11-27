<!DOCTYPE html>
<html>
<head>
    <title>Certificate Approved</title>
</head>
<body>
    <p>Dear {{ $name }},</p>

    <p>Your request for a {{ $certificateType }} has been approved.</p>

    <p><strong>Details:</strong></p>
    <ul>
        <li>Certificate Type: {{ $certificateType }}</li>
        <li>Price: ₱{{ $price }}</li>
        <li>Purpose: {{ $purpose }}</li>
        <li>Appointment Date: {{ $date }}</li>
    </ul>

    <p>Please proceed to the Barangay Office to claim your certificate.</p>

    <p>Thank you!</p>

    <p>Best Regards,</p>
    <p>Barangay Centro 2</p>
</body>
</html>
