# 176 modificando Login
php artisan make:component Link
recordar que al crealo nos dice donde se crea tanto la parte logica del lado del server como del front en la vista
# 180 Forzar al usuario a confirmar su cuenta para autenticarse
en routs auth se agrega verify asi como en el modelo User se agrega o quita segun sea su uso 
implements MustVerifyEmail comentar o descomentar segun sea su uso
para poder usar la funcionalidad de verify por corrreo
# 184 Ejecutar la migracion de rol y guardar la informacion
php artisan make:migration add_rol_to_users_table
php artisan migrate
no olvidar agregar rol en protected fillable del modelo users
# 185 Moviendo el dashboard hacia vacantes
de este modo creamos un resource controller que trae todos los metodos del controlador
php artisan make:controller VacanteController -r
php artisan make:model Vacante
php artisan make:migration create_vacante_table --create=vacantes
# 188 instalar livewire
Livewire es como una mezcla de js y php al mismo tiempo, da un comportamiento mas en timepo real

composer require livewire/livewire
@livewireStyles // va antes del cierre de header
@livewireScripts //va antes del cierre de body
php artisan make:livewire CrearVacante
Recordar que automaticamente genera dos archivos uno con la logica y otro con la vista
CLASS: app/Http/Livewire//CrearVacante.php
VIEW:  C:\xampp\htdocs\devjobs\resources\views/livewire/crear-vacante.blade.php
# 190 Seeding a la Base de datos para crear Salarios
php artisan make:seeder SalarioSeeder
php artisan make:migration create_salarios_table
paste into Salario Seeder y dar rango de valores
DB::table('salarios')->insert([
            'salario' => '$0 - $499',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
## IMPORTANTE ##
        Los Seeders no se ejecutaran si no se agregan del siguiente modo dentro de DatabaseSeeder.php
this->call(SalarioSeeder::class);
php artisan db:seed
## IMPORTANTE ##

## 191. Mostrando los Salarios en el Formulario

## 192. Creando Seeding de Categorias y Mostrando en el Formulario
php artisan make:seeder CategoriasSeeder
php artisan make:migration create_categorias_table
Los Seeders no se ejecutaran si no se agregan del siguiente modo dentro de DatabaseSeeder.php
this->call(CategoriasSalarioSeeder::class);
php artisan db:seed
para revertir cambios para que no reenvie datos precargados en el seeder anterior
php artisan migrate:rollback
php artisan make:model Categoria
## 193 Conectar formulario a livewire

## 195 Creando un componente de mensaje de error
php artisan make:livewire MostrarAlerta

## 197 Subida de archivos con livewire
del lado del server
use WithFileUploads;
'imagen' => 'required|image|max:1024'
del lado del cliente
accept="image/*"
## 198 Mostrar una imagen con preview
enlace de datos bidireccional enviar datos y recibe respuesta con wire
wire:model="imagen"

## 199 Problema con la migracion de vacantes 
## FORMA NO RECOMENDADA ##
Cuando no quiere aplicar la migracion revierte con
php artisan migrate:rollback
cambia numeracion en las migraciones, agrega campos guarda y por ultimo aplica
php artisan migrate

## 200 Que tienes que hacer cuando tienes problema con las migraciones opt1
Forma recomendada de hacer migraciones en el proyecto 
si agregad add en cada migracion se podria tener un versionamiento de migraciones
php artisan make:migration add_columns_to_vacantes_table
agregar campos a tabla vacantes mediante migracion add

## 201 Que tienes que hacer cuando tienes problema con las migraciones opt2
al aplicar rollback genera
SQLSTATE[42000]: Syntax error or access violation: 1091 Can't DROP COLUMN `descripcion`; check that it exists (SQL: alter table `vacantes` drop `titulo`, drop `salario_id`, drop `categoria_id`, drop `empresa`, drop `ultimo_dia`, drop `descripcion`, drop `imagen`, drop `publicado`, drop `user_id`)
esto es para evitar dejar huecos en los registros de modo que 
## 202 Almacenadno imagen
$imagen = $this->imagen->store('public/vacantes');
$nombre_imagen = str_replace('public/vacantes/','',$imagen);
dd($nombre_imagen);
## 203 Almacenando la vacante
ocupamos array asociativo para tomar lo que viene en la variable JS y enviarla por store mendiante el modelo a la BD

## 204 Redireccionar al usuario y crear un mensaje de sesion
Se hace
//Crear un mensaje de alerta con la sesion se declara el nombre y mensaje a mostrar
session()->flash('mensaje','La vacante se publico correctamente');
//Redireccionar el usuario
return redirect()->route('vacantes.index');

el mensaje flash creado se pasa a la vista del redirect
### CREANDO PANEL DE ADMINISTRACION
## 205 Mostrar las vacantes creadas por el reclutador creadas por Livewire
php artisan make:livewire MostrarVacantes 
## 206 Creando botones de administracion
Agregando botones editar eliminar y ver candidatos
## 207 Finalizando el listado de vacantes
Condicionamos como mostrar las vacantes ya sea con un foreach o un forelse
@forelse($vacantes as $vacante)
     //mostrar enc aso de cumplirse 
    @empty
        //Mostrar mensaje si no se cumple
    @endforelse
## 208 Añadiendo paginacion
del siguiente modo se paginaria en automatico solo queda pasarle la acantidad de registros que quiera devolver desde el controlador
    {{$vacantes->links()}}
para que el texto de la paginacion lo muestre en español debe publicarse el paquete y sacarlo del core de Laravel del siguiente modo
php artisan vendor:publish --tag=laravel-pagination
esto puede servir muy la otra forma seria editar manualmente desde 
/vendor/laravel/framework/src/Illuminate/Pagination/Resources/Views/tailwind.blade.php
### EDICION DE VACANTES ###
## 209 Routing y model binding hacia editar vacante
Routing model binding es la asociacion del ruteo con modelos de este modo, instancias modelos a travez de la ruta para pasar valores
## 210 Creando el componente de livewire y formulario
php artisan make:livewire EditarVacante
## 211 El metodo mount de livewire

## 212 llenando el formulario con la informacion de la vacante a editar
## 213 Ajustando el componente para edicion
## 214 Editando la vacante
## 215 Detectar su la imagen se esta reemplazando
## 216 Añadiendo un Policy de Edicion

### ELIMINAR VACANTES CON LIVEWIRE Y SWEETALERT2 ###

## 217 Añadiendo SweetAlert2
## 218 Eventos en livewire
## 219 Emitir eventos desde la vista hasta el componente y eliminar

### MOSTRANDO VACANTE EN EL FRONT-END###

## 220 Creando la ruta y pasando informacion
## 221 Mostrando informacion de la vacante
## 222 Creando relaciones de categoria y salario t mostrarnos su valores
## 223 Mostrando imagen y descripcion del trabajo
## 224 Solucionandi detalles en el layout principal
## 225 Mostrando mensajes al usuario de crear cuenta si desea aplicar a la vacante
### MANEJAR ROLES DE DEV Y RECLUTADOR ###
## 226 Ocultar acceso a Devs para listar vacantes
## 227 Ocultar acceso a devs para crear vacantes

### POSTULARSE A UNA VACANTE ####

## 228 Crear el componente de postularse a la vacante
## 229 Añadir el HTML del componente
## 230 Crear la migracion de candidatos 
## 231 Validacion del formulario 
## 232 Almacenando CV u hoja de vida
## 233 Crear la relacion en el modelo de candidatos y vacantes
## 234 Mostrando un mensaje flash
## NOTIFICACIONES TIPO SLACK TWITTER O FACEBOOK ##
## 235
## 236
## 237
## 238
## 239
## 240
## 241
## 242
## 243
## 244
## 245
## 246
## 247
## 248
## 249
## 250
## 251
## 252
##
##
##