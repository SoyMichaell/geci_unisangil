<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GICPAC | @yield('title_report')</title>
</head>
<style>
    body {
        font-family: 'Helvetica';
    }

    .table {
        width: 100%;
        margin-top: 35px;
        border-collapse: collapse;
        border-top: 2px solid black;
    }

    .table th,
    .table td {
        padding: 6px;
        font-size: 14px;
        border-bottom: 1px solid #dddddd;
    }

    .table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        font-size: 14px;
        color: #000;
    }

    img {
        width: 80px;
        float: left;
    }

    .header_right {
        font-size: 14px;
        text-align: right;
    }

    .titulo__header {
        font-size: 20px;
        text-align: left;
    }

    .left__footer {
        text-align: left;
        width: 100%;
        bottom: 0px;
        font-size: 14px;
        position: fixed;
    }

    .right__footer {
        text-align: right;
        width: 100%;
        bottom: 0px;
        font-size: 14px;
        position: fixed;
    }

    .prepage{
        width: 96%;
        text-align: center;
        bottom: 0px;
        font-size: 14px;
        position: fixed;
    }

    .pagenum{
        width: 100%;
        text-align: center;
        bottom: 0px;
        font-size: 14px;
        position: fixed;
    }

    .pagenum:before {
        content: counter(page);
    }

</style>

<body>


    @yield('content')



    <footer>
        <span class="left__footer">Fundación Universitaria de Unisangil Sede Yopal</span>
        <span class="prepage">Pag.</span><span class="pagenum"></span>
        <span class="right__footer">Copyright 2022. Todos los derechos reservados</span>
    </footer>



</body>

</html>
