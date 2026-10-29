
#Importamos la libreria de flask
from flask import Flask, render_template, redirect, request, url_for, session

#importar la libreria de mysql para Flask
from flask_mysqldb import MySQL

#importamos librerias para importar un hash y comprobar que el hash coincida con la contraseña
from werkzeug.security import generate_password_hash, check_password_hash

#Creamos una insatancia del proyecto
app = Flask(__name__)
#Permite cargar las vistas cuando se modifican
app.config["TEMPLATES_AUTO_RELOAD"] = True

#Configuración de la conexion
app.config['MYSQL_HOST'] ='localhost'
app.config['MYSQL_USER'] ='root'
app.config['MYSQL_PASSWORD'] ='26102007ch'
app.config['MYSQL_DB'] ='dbflask'
app.secret_key = 'mysecretkey'

mysql = MySQL(app)


#Ruta raiz
@app.route("/")
def home():
    return render_template("login.html")

#Creamos la ruta de registro
@app.route("/registro", methods=["GET","POST"])
def registro():
    if request.method == "POST":
        nombre = request.form["nombre"]
        apellido_p = request.form["apellido_p"]
        apellido_m = request.form["apellido_m"]
        correo = request.form["correo"]
        password = request.form["password"]
        id_rol = request.form["id_rol"]

        #Generar el hash de la contraseña
        password_hash = generate_password_hash(password)

        cursor = mysql.connection.cursor()
        
        #Comprobar si el correo ya existe
        cursor.execute(
            "SELECT id FROM usuarios WHERE correo = %s",
            (correo,)
        )

        if cursor.fetchone():
            cursor.close()
            return render_template ("registro.html")
        
        #Insertar el usuario a la base de datos
        cursor.execute(
            """INSERT INTO usuarios
            (nombre, apellido_p, apellido_m, correo, password, id_rol)
            VALUES (%s, %s, %s, %s, %s, %s)
            """, (
                nombre, 
                apellido_p,
                apellido_m,
                correo,
                password_hash,
                id_rol
            )
        )
        #Para guardar en la BD
        mysql.connection.commit()
        cursor.close()
        return redirect(url_for("home"))
    #
    return render_template("registro.html")

#29/10/2026
#Ruta de login para el inicio de sesión
@app.route("/login", method = ["GET", "POST"])
def login():

    #Verificar si se enviaron los datos del formulario
    if request.method == "POST":

        correo = request.form("correo")
        password = request.form("password")

        #Crear un cursor para ejecutar SQL
        cursor = mysql.connection.cursor()

        #Consulta SQL
        sql = """
            SELECT 
            usuarios.id,
            usuarios.nombre,
            usuarios.apellido_p,
            usuarios.apellido_m,
            usuarios.correo,
            usuarios.password,
            roles.nombre

            FROM usuarios
            INNER JOIN roles
            ON usuarios.id_rol = roles.id_rol
            WHERE usuarios.correo = %s
        """
        #Vamos a ejecutar la consulta pasandole como parametro el corro
        cursor.execute(sql, (correo,))

        #Recuperar el primer registro encontrado
        usuario = cursor.fetchone()

        #Cerramos el cursor
        cursor.close()

        #Vamos a comparar la contraseña con el hash generado anterioremnete al registar usuario
        if usuario and check_password_hash(usuario[5], password):

            #
            session["id_usuario"] = usuario[0]

            session["nombre"] = usuario[1]

            session["rol"] = usuario[6]

            #Si el rol es administrador lo manda a la ruta administrador sino a la de usuarios
            if session["rol"] == "Administrador":
                return redirect(url_for("admin"))
            return redirect(url_for("usuario"))
        
        return render_template(
            "login.html",
            error = "Correo o contraseña incorrectos")
    return render_template()

#Ejecutar el proyecto en el puerto 5000
if __name__ == "__main__":
    app.run(port=5000)
