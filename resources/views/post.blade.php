<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Gallary</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
            crossorigin="anonymous"
        />
        <style>
        img{
            width: 100%; 
            height: 250px; 
            display: block;
            border: 1px solid black;
        }
    </style>
    </head>
    <body>
        <section>
            <div class="container">
                <div class="row">
                    @foreach($post as $p)
                    <h1 style="color:green">{{$p->title}}</h1>
                    <h2 style="color:red">{{$p->user->name}}</h2>
                    @endforeach
                </div>
            </div>
        </section>
     
    </body>
</html>
