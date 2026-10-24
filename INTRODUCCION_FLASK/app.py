
#Importamos la libreria de flask
from flask import Flask, render_template, redirect, request

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
app.config['MYSQL_DB'] ='dbFlask'
app.secret_key = 'mysecretkey'

mysql = MySQL(app)


#Ruta raiz
@app.route("/")
def home():
    return render_template("login.html")

#Creamos la ruta de registro
@app.route("/registro", method=["GET","POST"])
def registro():
    if request.method == "POST":
        nombres = request.form["nombre"]
        apellido_p = request.form["apellido_p"]
        apellido_m = request.form["apellido_m"]
        correo = request.form["correo"]
        password_hash = request.form["password_hash"]
        id_rol = request.form["id_rol"]

#Generamos un hash en el puerto 5000
        password = generate_password_hash(password_hash)

#Ejecutar el proyecto en el puerto 5000
if __name__ == "__main__":
    app.run(port = 5000)
