<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Plataforma de pedidos</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <br/>
                <br/>
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <div class="ml-4 text-lg leading-7 font-semibold">
                        <a href="https://github.com/namoclopez2020/manzana-verde-test" target="_blank" class="underline text-gray-900 dark:text-white">
                            Plataforma de pedidos - namoclopez2020
                        </a>
                    </div>
                    <div class="ml-12">
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-lg">
                            Repositorio público en mi 
                            <a href="https://github.com/namoclopez2020/manzana-verde-test" target="_blank" class="underline text-gray-900 dark:text-white">
                                GitHub:
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="text-lg leading-7 font-semibold">
                                    - Objetivo:
                                </div>
                            </div>
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-base font-semibold">
                                    El desafío es crear una mini plataforma de pedidos, donde va existir un login, registro y la vista del pedidos donde 
                                    el usuario va a poder generar un pedido de un listado de comidas.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="text-lg leading-7 font-semibold">
                                    - Requisitos:
                                </div>
                            </div>
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-base font-semibold">
                                    <table class="table table-bordered" style="width:90%">
                                        <thead>
                                          <tr>
                                            <th scope="col-2"></th>
                                            <th scope="col-8" class="text-center">Requisito</th>
                                            <th scope="col-2" class="text-center">Importancia</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th scope="row" class="text-center">1</th>
                                            <td>Registro de usuarios</td>
                                            <td class="text-center"><span class="badge badge-pill badge-danger">High</span></td>
                                          </tr>
                                          <tr>
                                            <th scope="row" class="text-center">2</th>
                                            <td>Autenticacion de usuarios</td>
                                            <td class="text-center"><span class="badge badge-pill badge-danger">High</span></td>
                                          </tr>
                                          <tr>
                                            <th scope="row" class="text-center">3</th>
                                            <td>Listado de comidas</td>
                                            <td class="text-center"><span class="badge badge-pill badge-danger">High</span></td>
                                          </tr>
                                          <tr>
                                            <th scope="row" class="text-center">4</th>
                                            <td>Seleccion de comidas por usuario</td>
                                            <td class="text-center"><span class="badge badge-pill badge-danger">High</span></td>
                                          </tr>
                                          <tr>
                                            <th scope="row" class="text-center">5</th>
                                            <td>Quitar seleccion de comidas por usuario</td>
                                            <td class="text-center"><span class="badge badge-pill badge-danger">High</span></td>
                                          </tr>
                                        </tbody>
                                      </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="text-lg leading-7 font-semibold">
                                    - Diagrama de clases:
                                </div>
                            </div>
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-base font-semibold d-flex justify-content-center">
                                    <img src="{{asset('images/diagrams/class_diagram.png')}}" class="img-fluid" alt="Responsive image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="text-lg leading-7 font-semibold">
                                    - Diagramas de secuencias:
                                </div>
                            </div>
                            <br>
                            <div class="ml-12">
                                <h4> -> Login de usuario</h4>
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-base font-semibold d-flex justify-content-center">
                                    <img src="{{asset('images/diagrams/sequence_diagram_login.png')}}" class="img-fluid" alt="Responsive image">
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="ml-12">
                                <h4> -> Registrar un nuevo usuario</h4>
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-base font-semibold d-flex justify-content-center">
                                    <img src="{{asset('images/diagrams/diagram_sequence_register.png')}}" class="img-fluid" alt="Responsive image">
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="ml-12">
                                <h4> -> Crear una nueva comida</h4>
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-base font-semibold d-flex justify-content-center">
                                    <img src="{{asset('images/diagrams/diagram_sequence_create_food.png')}}" class="img-fluid" alt="Responsive image">
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="ml-12">
                                <h4> -> Generar una nueva imagen</h4>
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-base font-semibold d-flex justify-content-center">
                                    <img src="{{asset('images/diagrams/diagram_sequence_generate_image.png')}}" class="img-fluid" alt="Responsive image">
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="ml-12">
                                <h4> -> Lista de comidas no asociadas al usuario</h4>
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-base font-semibold d-flex justify-content-center">
                                    <img src="{{asset('images/diagrams/diagram_sequence_unselected_food_list.png')}}" class="img-fluid" alt="Responsive image">
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="ml-12">
                                <h4> -> Lista de comidas asociadas al usuario</h4>
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-base font-semibold d-flex justify-content-center">
                                    <img src="{{asset('images/diagrams/diagram_sequence_selected_food_list_by_user.png')}}" class="img-fluid" alt="Responsive image">
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="ml-12">
                                <h4> -> Asociar una comida a un usuario</h4>
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-base font-semibold d-flex justify-content-center">
                                    <img src="{{asset('images/diagrams/diagram_sequence_assign_food_by_user.png')}}" class="img-fluid" alt="Responsive image">
                                </div>
                            </div>
                            <br>
                            <hr>
                            <h4> -> Borrar una comida asociada a un usuario</h4>
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-base font-semibold d-flex justify-content-center">
                                <img src="{{asset('images/diagrams/diagram_sequence_delete_food_of_user.png')}}" class="img-fluid" alt="Responsive image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="text-lg leading-7 font-semibold">
                                    - Endpoints:
                                </div>
                            </div>
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-base font-semibold">
                                    Ejemplos de solicitudes (Javascript):
                                    <br>
                                    <br>
                                    Todas las cabeceras deben contener:
                                    <pre><code>Accept: 'application/json'</code></pre>
                                    <br>
                                    Todas las rutas a excepcion de /api/auth/register deben contener:
                                    <pre><code>Autorization: 'Token Bearer'</code></pre>
                                    <br/>
                                    Ejemplo de una solicitud con Axios:
                                    <br/>
                                    <pre><code>
const axiosIns = axios.create({
    mode: 'cors',
    cache: 'no-cache', 
    baseURL: 'https://josenamoc-manzana-verde-api.herokuapp.com/',
    headers: {
        'Content-Type' : 'application/x-www-form-urlencoded',
        Accept : 'application/json',
        Autorization : 'Token Bearer'
    },
    redirect: 'follow', 
    referrerPolicy: 'no-referrer', 
})

axiosIns.get('/api/food/list?per_page=10&amp;current_page=1')
.then( (res) => {
    console.log('response',res);
});
                                    </code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="text-lg leading-7 font-semibold">
                                    - Rutas Disponibles:
                                </div>
                            </div>
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-base font-semibold">
                                    <div class="text-lg leading-7 font-semibold">
                                        /api/auth/register (POST) // Para registrar un nuevo usuario
                                    </div>
                                    <div class="flex items-center">
                                        <div class="ml-4 text-base leading-7 font-semibold">
                                            Request:
                                            <pre>
<code>
    {
        name  : 'prueba',
        email : 'prueba@gmail.com',
        password : '123456',
        c_password: '123456'
    }
</code>
                                            </pre>
                                            Response:
                                            <pre>
<code>
    {
        "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9tYW56YW5hLXZlcmRlLXRlc3QudGVzdFwvYXBpXC9hdXRoXC9yZWdpc3RlciIsImlhdCI6MTYzMjUxMDYzMywiZXhwIjoxNjMyNTE0MjMzLCJuYmYiOjE2MzI1MTA2MzMsImp0aSI6IjJ1OUdQSXFWVDl3RnFZY2EiLCJzdWIiOjExLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.gNzZ3btExwumQKLkUWHlJ4aMSob-PGwlyMzc7IEAJ18",
        "token_type": "bearer",
        "expires_in": 3600,
        "user": {
            "id": 11,
            "name": "prueba",
            "email": "prueba@gmail.com",
            "email_verified_at": null,
            "created_at": "2021-09-24T19:10:33.000000Z",
            "updated_at": "2021-09-24T19:10:33.000000Z"
        }
    }
</code>
                                            </pre>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="text-lg leading-7 font-semibold">
                                        /api/auth/login (POST) // Para autenticar un usuario y obtener el token
                                    </div>
                                    <div class="flex items-center">
                                        <div class="ml-4 text-base leading-7 font-semibold">
                                            Request:
                                            <pre>
<code>
    {
        email : 'prueba@gmail.com',
        password : '123456'
    }
</code>
                                            </pre>
                                            Response:
                                            <pre>
<code>
    {
        "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9tYW56YW5hLXZlcmRlLXRlc3QudGVzdFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTYzMjUxNzUwOCwiZXhwIjoxNjMyNTIxMTA4LCJuYmYiOjE2MzI1MTc1MDgsImp0aSI6IjM1am96bGtkODcwY2dLV0YiLCJzdWIiOjExLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.1b0PhJjimRT4axplC_OZn7rF7EUwKsIwHsTSrL-IZME",
        "token_type": "bearer",
        "expires_in": 3600,
        "user": {
            "id": 11,
            "name": "prueba",
            "email": "prueba@gmail.com",
            "email_verified_at": null,
            "created_at": "2021-09-24T19:10:33.000000Z",
            "updated_at": "2021-09-24T19:10:33.000000Z"
        }
    }
</code>
                                            </pre>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="text-lg leading-7 font-semibold">
                                        /api/auth/logout (GET) // Para desloguear un usuario e invalidar el token actual
                                    </div>
                                    <div class="flex items-center">
                                        <div class="ml-4 text-base leading-7 font-semibold">
                                            Ejemplo de URL: <code>https://josenamoc-manzana-verde-api.herokuapp.com/api/logout</code>
                                            <br>
                                            Response:
                                            <pre>
<code>
    {
        "message": "User successfully signed out"
    }
</code>
                                            </pre>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="text-lg leading-7 font-semibold">
                                        /api/food/create (POST) // Para crear una nueva comida
                                    </div>
                                    <div class="flex items-center">
                                        <div class="ml-4 text-base leading-7 font-semibold">
                                            Request:
                                            <pre>
        <code>
            {
                "name" : "Nueva comida",
                "description" : "Descripcion de nueva comida"
                "picture" : "https://images.pexels.com/photos/1260968/pexels-photo-1260968.jpeg?auto=compress&cs=tinysrgb&h=350"
            }
        </code>
                                            </pre>
                                            Response:
                                            <pre>
        <code>
            {
                "data": {
                    "message": "Comida creada correctamente"
                }
            }
        </code>
                                            </pre>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="text-lg leading-7 font-semibold">
                                        /api/food/generate_image (GET) // Para generar una imagen de comida
                                    </div>
                                    <div class="flex items-center">
                                        <div class="ml-4 text-base leading-7 font-semibold">
                                            Ejemplo de URL: <code>https://josenamoc-manzana-verde-api.herokuapp.com/api/food/generate_image?food=pizza</code>
                                            <br>
                                            Response:
                                            <pre>
<code>
    {
        "data": {
            "image_url": {
                "id": 1260968,
                "width": 2640,
                "height": 3960,
                "url": "https://www.pexels.com/photo/baked-pizza-with-basil-leaves-1260968/",
                "photographer": "Daria Shevtsova",
                "photographer_url": "https://www.pexels.com/@daria",
                "photographer_id": 220024,
                "avg_color": "#887C5E",
                "src": {
                    "original": "https://images.pexels.com/photos/1260968/pexels-photo-1260968.jpeg",
                    "large2x": "https://images.pexels.com/photos/1260968/pexels-photo-1260968.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940",
                    "large": "https://images.pexels.com/photos/1260968/pexels-photo-1260968.jpeg?auto=compress&cs=tinysrgb&h=650&w=940",
                    "medium": "https://images.pexels.com/photos/1260968/pexels-photo-1260968.jpeg?auto=compress&cs=tinysrgb&h=350",
                    "small": "https://images.pexels.com/photos/1260968/pexels-photo-1260968.jpeg?auto=compress&cs=tinysrgb&h=130",
                    "portrait": "https://images.pexels.com/photos/1260968/pexels-photo-1260968.jpeg?auto=compress&cs=tinysrgb&fit=crop&h=1200&w=800",
                    "landscape": "https://images.pexels.com/photos/1260968/pexels-photo-1260968.jpeg?auto=compress&cs=tinysrgb&fit=crop&h=627&w=1200",
                    "tiny": "https://images.pexels.com/photos/1260968/pexels-photo-1260968.jpeg?auto=compress&cs=tinysrgb&dpr=1&fit=crop&h=200&w=280"
                },
                "liked": false
            }
        }
    }
</code>
                                            </pre>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="text-lg leading-7 font-semibold">
                                        /api/food/list (GET) // Para listar las comidas sin asignar por el usuario
                                    </div>
                                    <div class="flex items-center">
                                        <div class="ml-4 text-base leading-7 font-semibold">
                                            Parametros opcionales:
                                            <ul>
                                                <li>per_page (cantidad de items por página)</li>
                                                <li>page (Página actual)</li>
                                            </ul>
                                            Ejemplo de URL: <code>https://josenamoc-manzana-verde-api.herokuapp.com/api/food/list?per_page=10&amp;page=3</code>
                                            <br>
                                            Response:
                                            <pre>
<code>
    {
        "data": {
            "list": {
                "current_page": 3,
                "data": [
                    {
                        "name": "eaque",
                        "picture": "https://via.placeholder.com/640x480.png/00aa88?text=food+quidem",
                        "description": "Impedit consequatur vel nostrum quod assumenda iure. Laudantium repellendus enim qui et fugit neque quia."
                    },
                    {
                        "name": "maiores",
                        "picture": "https://via.placeholder.com/640x480.png/00ddee?text=food+nulla",
                        "description": "Itaque et praesentium repellendus facere laborum assumenda. Soluta quia placeat nihil officiis recusandae quia neque. Et possimus sunt repudiandae nam iure."
                    }
                ],
                "first_page_url": "https://josenamoc-manzana-verde-api.herokuapp.com/api/food/list?page=1",
                "from": 21,
                "last_page": 19,
                "last_page_url": "https://josenamoc-manzana-verde-api.herokuapp.com/api/food/list?page=19",
                "links": [
                    {
                        "url": "https://josenamoc-manzana-verde-api.herokuapp.com/api/food/list?page=2",
                        "label": "&laquo; Previous",
                        "active": false
                    },
                    {
                        "url": "https://josenamoc-manzana-verde-api.herokuapp.com/api/food/list?page=1",
                        "label": "1",
                        "active": false
                    },
                    {
                        "url": "https://josenamoc-manzana-verde-api.herokuapp.com/api/food/list?page=2",
                        "label": "2",
                        "active": false
                    },
                    {
                        "url": "http://manzana-verde-test.test/api/food/list?page=4",
                        "label": "Next &raquo;",
                        "active": false
                    }
                ],
                "next_page_url": "http://manzana-verde-test.test/api/food/list?page=4",
                "path": "http://manzana-verde-test.test/api/food/list",
                "per_page": 10,
                "prev_page_url": "http://manzana-verde-test.test/api/food/list?page=2",
                "to": 15,
                "total": 30
            }
        }
    }
</code>
                                            </pre>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="text-lg leading-7 font-semibold">
                                        /api/food/list_of_user (GET) // Para listar las comidas asignadas por el usuario
                                    </div>
                                    <div class="flex items-center">
                                        <div class="ml-4 text-base leading-7 font-semibold">
                                            Parametros opcionales:
                                            <ul>
                                                <li>per_page (cantidad de items por página)</li>
                                                <li>page (Página actual)</li>
                                            </ul>
                                            Ejemplo de URL: <code>https://josenamoc-manzana-verde-api.herokuapp.com/api/food/list_of_user?per_page=10&amp;page=3</code>
                                            <br>
                                            Response:
                                            <pre>
<code>
    {
        "data": {
            "list": {
                "current_page": 3,
                "data": [
                    {
                        "name": "eaque",
                        "picture": "https://via.placeholder.com/640x480.png/00aa88?text=food+quidem",
                        "description": "Impedit consequatur vel nostrum quod assumenda iure. Laudantium repellendus enim qui et fugit neque quia."
                    },
                    {
                        "name": "maiores",
                        "picture": "https://via.placeholder.com/640x480.png/00ddee?text=food+nulla",
                        "description": "Itaque et praesentium repellendus facere laborum assumenda. Soluta quia placeat nihil officiis recusandae quia neque. Et possimus sunt repudiandae nam iure."
                    }
                ],
                "first_page_url": "https://josenamoc-manzana-verde-api.herokuapp.com/api/food/list_of_user?page=1",
                "from": 21,
                "last_page": 19,
                "last_page_url": "https://josenamoc-manzana-verde-api.herokuapp.com/api/food/list_of_user?page=19",
                "links": [
                    {
                        "url": "https://josenamoc-manzana-verde-api.herokuapp.com/api/food/list_of_user?page=2",
                        "label": "&laquo; Previous",
                        "active": false
                    },
                    {
                        "url": "https://josenamoc-manzana-verde-api.herokuapp.com/api/food/list_of_user?page=1",
                        "label": "1",
                        "active": false
                    },
                    {
                        "url": "https://josenamoc-manzana-verde-api.herokuapp.com/api/food/list_of_user?page=2",
                        "label": "2",
                        "active": false
                    },
                    {
                        "url": "http://manzana-verde-test.test/api/food/list_of_user?page=4",
                        "label": "Next &raquo;",
                        "active": false
                    }
                ],
                "next_page_url": "http://manzana-verde-test.test/api/food/list_of_user?page=4",
                "path": "http://manzana-verde-test.test/api/food/list_of_user",
                "per_page": 10,
                "prev_page_url": "http://manzana-verde-test.test/api/food/list_of_user?page=2",
                "to": 15,
                "total": 30
            }
        }
    }
</code>
                                            </pre>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="text-lg leading-7 font-semibold">
                                        /api/food/assign (POST) // Para asignar una comida a un usuario
                                    </div>
                                    <div class="flex items-center">
                                        <div class="ml-4 text-base leading-7 font-semibold">
                                            Request:
                                            <pre>
<code>
    {
        food_id : 1,
    }
</code>
                                            </pre>
                                            Response:
                                            <pre>
<code>
    {
        "data": {
            "message": "Comida asignada correctamente"
        }
    }
</code>
                                            </pre>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="text-lg leading-7 font-semibold">
                                        /api/food/delete (POST) // Para remover una comida de la lista de seleccionados
                                    </div>
                                    <div class="flex items-center">
                                        <div class="ml-4 text-base leading-7 font-semibold">
                                            Request:
                                            <pre>
<code>
    {
        food_id : 1,
    }
</code>
                                            </pre>
                                            Response:
                                            <pre>
<code>
    {
        "data": {
            "message": "Comida removida de la lista correctamente"
        }
    }
</code>
                                            </pre>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="text-lg leading-7 font-semibold">
                                    - Archivo postman con rutas de prueba:
                                </div>
                            </div>
                            <br>
                            <a class="text-danger" href="{{asset('manzana verde.postman_collection.json')}}" target="_blank">Archivo Postman</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>