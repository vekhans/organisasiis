<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Berita</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        /**
        Set the margins of the page to 0, so the footer and the header
        can be of the full height and width !
        **/
        @page {
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            margin: 0cm 0cm;
        }
        /** Define now the real margins of every page in the PDF **/
        body {
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            margin-top: 2cm;
            margin-left: 3cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }
        /** Define the header rules **/
        header {
            position: fixed;
            top: 0.6cm;
            left: 3cm;
            right: 2cm;
            height: 2cm;
        }
        /** Define the footer rules **/
        footer {
            position: fixed; 
            bottom: 1cm; 
            left: 3cm; 
            right: 2cm;
            height: 1cm;
        }
    </style>   
</head>
<body>
    <header>
        <img src="media/veky.png" alt="Rating berita veky" width="100%" height="100%"/>
        <!-- <img src="header.png" width="100%" height="100%"/> -->
    </header>
    <footer>
         <img src="media/veky.png" alt="Rating berita veky" width="100%" height="100%"/>
    </footer>
    <table>
        <thead class=" thead text-center">
            <tr>
                <th>Id</th>
                <th>|</th>
                <th>Judul</th>
                <th>|</th>
                <th>Tgl. Tambah</th>
                <th>|</th>
                <th>Nama Penulis</th>
            </tr>
            
 
        </thead>
        <tbody>
             
            @foreach($data as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <th>|</th>
                <td>{{ $customer->judul }}</td>
                <th>|</th>
                <td>{{ $customer->created_at->format('d / m / y') }}</td>
                <th>|</th>
                <td>{{ $customer->admin->name }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot class=" thead text-center">
            <tr>
                <th>Id</th>
                <th>|</th>
                <th>Judul</th>
                <th>|</th>
                <th>Tgl. Tambah</th>
                <th>|</th>
                <th>Nama Penulis</th>
            </tr>
        </tfoot>
</table>
<div style="text-align:center"> Thanxxxxxxxxxx </div> 
</body>
 
</html>

<!--
<html>
    <head>
        <style>
            /** 
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
            @page {
                margin: 0cm 0cm;
            }

            /** Define now the real margins of every page in the PDF **/
            body {
                margin-top: 3cm;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 2cm;
            }

            /** Define the header rules **/
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 3cm;
            }

            /** Define the footer rules **/
            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 2cm;
            }
        </style>
    </head>
    <body>
       // Define header and footer blocks before your content 
        <header>
            <img src="header.png" width="100%" height="100%"/>
        </header>

        <footer>
            <img src="footer.png" width="100%" height="100%"/>
        </footer>

       // Wrap the content of your PDF inside a main tag 
        <main>
            <h1>Hello World</h1>
        </main>
    </body>
</html>
    -->