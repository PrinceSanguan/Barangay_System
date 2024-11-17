<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incident Report #{{ $data->id }}</title>
</head>
<body>
    <h1>Incident Report</h1>
    <p><strong>Incident ID:</strong> {{ $data->id }}</p>
    <p><strong>Incident Date & Time:</strong> {{ $data->incident_datetime }}</p>
    <p><strong>Location:</strong> {{ $data->location }}</p>
    <p><strong>Incident Type:</strong> {{ $data->incident_type }}</p>

    <h3>Persons Involved</h3>
    @foreach ($data->persons_involved as $person)
        <p>Name: {{ $person['name'] }}, Age: {{ $person['age'] }}</p>
    @endforeach

    <h3>Witnesses</h3>
    @foreach ($data->witnesses as $witness)
        <p>Witness: {{ $witness['witness_name'] }}, Contact: {{ $witness['witness_contact'] }}</p>
    @endforeach

    <h3>Incident Details</h3>
    <p>{{ $data->incident_details }}</p>
</body>
</html>
