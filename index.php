<html>
<head>
    <title>Automatic Sequence Correction &amp; Visualization</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
</head>
<body>
    <div class="container-fluid">
    <h2>Enter Sequence</h2>
    <form id="seqFormId">
        <textarea name="sequence" rows="10" cols="40"></textarea><br><br>
        <button type="submit" class="btn btn-success">Process</button>
    </form>

    <canvas id="seqChartId" width="400" height="200"></canvas>
    <script src="js/chart.js"></script>
    </div>
</body>
</html>
