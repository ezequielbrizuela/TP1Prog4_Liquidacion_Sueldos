Prompt Creado para la elaboración de la aplicación web PHP

Actúa como un desarrollador web especializado en PHP, HTML5, CSS3 y Bootstrap 5.
Necesito desarrollar un trabajo práctico universitario para la materia Programación IV, correspondiente a la carrera de Ingeniería en Sistemas de Información.
El objetivo es implementar un microsistema de liquidación de sueldos, que permita seleccionar una categoría laboral, ingresar la antigüedad de un empleado y calcular automáticamente sus haberes, descuentos y sueldo neto.
La aplicación debe cumplir con los siguientes requisitos funcionales, técnicos y restricciones.

1. Tecnologías obligatorias
    PHP para realizar los cálculos en el servidor.
    HTML5 para estructurar la interfaz.
    CSS3 para personalizar la presentación.
    Bootstrap 5 para implementar un diseño moderno, ordenado y responsive.
    Servidor Apache mediante XAMPP para ejecutar la aplicación en localhost.
    No utilizar frameworks de PHP como Laravel o Symfony, ni frameworks de JavaScript como React o Angular.
    No utilizar bases de datos, ya que los valores salariales estarán definidos directamente en el código PHP.

2. Formulario de ingreso
    La aplicación debe mostrar un formulario con los siguientes campos:
    Categoría laboral:
    Categoría A.
    Categoría B.
    Categoría C.
    Categoría D.

    Antigüedad:
        Permitir seleccionar valores enteros desde 1 hasta 30 años.
        No permitir valores negativos, cero, decimales o superiores a 30.
        Incluir un botón denominado "Calcular liquidación" para enviar los datos al servidor mediante el método POST.
        
3. Escala salarial predefinida
    El sistema debe utilizar los siguientes sueldos básicos:

    Categoría   Sueldo básico
    A            $4.050,55   
    B            $3.209,20   
    C            $2.575,73
    D            $1.812,28

Estos importes deben estar almacenados en una estructura de datos de PHP, preferentemente un arreglo asociativo.
No permitir que el usuario modifique los sueldos básicos desde el formulario.

4. Cálculo de haberes
Los haberes deben calcularse utilizando el sueldo básico correspondiente a la categoría seleccionada.
Bonificación por antigüedad:
Corresponde al 10% del sueldo básico multiplicado por la cantidad de años de antigüedad.
Fórmula:	Antigüedad = Sueldo Básico × 0.10 × Años de Antigüedad

Bonificación por presentismo:
Corresponde al 15% del sueldo básico.
Fórmula:	Presentismo = Sueldo Básico × 0.15

Bonificación por dedicación especial:
Corresponde al 50% del sueldo básico.
Fórmula:	Dedicación Especial = Sueldo Básico × 0.50

Total de haberes:
Total Haberes = Sueldo Básico + Antigüedad + Presentismo + Dedicación Especial

5. Cálculo de descuentos
Los descuentos deben calcularse sobre el total de haberes, no solamente sobre el sueldo básico.
Obra social:				    Obra Social = Total Haberes × 0.05
Aporte jubilatorio (ANSES):	    Aporte Jubilatorio = Total Haberes × 0.11
Total de descuentos: 			Total Descuentos = Obra Social + Aporte Jubilatorio

6. Cálculo del sueldo neto
El sueldo neto debe obtenerse restando los descuentos al total de haberes.
Fórmula:	Sueldo Neto = Total Haberes - Total Descuentos

7. Presentación de resultados
Una vez procesado el formulario, mostrar una liquidación que contenga:
Categoría laboral seleccionada.
Cantidad de años de antigüedad.
Sueldo básico.
Bonificación por antigüedad.
Bonificación por presentismo.
Bonificación por dedicación especial.
Descuento por obra social.
Descuento por aporte jubilatorio.
Total de haberes.
Total de descuentos.
Sueldo neto.
Utilizar una tabla o estructura visual clara para identificar los conceptos y sus importes.
Destacar visualmente el sueldo neto y permitir realizar una nueva liquidación.

8. Validaciones y restricciones
Implementar las siguientes validaciones:
La categoría debe ser exclusivamente A, B, C o D.
La antigüedad debe ser un número entero entre 1 y 30.
No procesar solicitudes que contengan datos inválidos.
Validar los datos del formulario en PHP, aunque existan validaciones HTML.
Evitar errores por variables inexistentes o parámetros faltantes.
Escapar los datos mostrados en HTML cuando corresponda.
No permitir que el usuario envíe un sueldo básico arbitrario.
Evitar cálculos incorrectos por utilizar porcentajes sobre bases equivocadas.
Para respetar el comportamiento del sistema original, mantener la precisión de los cálculos sin redondear los valores intermedios a dos decimales. Los importes deben poder visualizarse con sus decimales significativos.

9. Diseño de la interfaz
Utilizar Bootstrap 5 y CSS para crear una interfaz visualmente agradable.
El diseño debe cumplir las siguientes características:
Formulario centrado y de fácil comprensión.
Campos correctamente identificados.
Diseño adaptable a computadoras y dispositivos móviles.
Separación visual de haberes y descuentos.
Identificación destacada del sueldo neto.
Mensajes de error comprensibles para el usuario.
Presentación profesional, sin elementos innecesarios.

10. Estructura del proyecto
Organizar el código en archivos PHP y CSS, separando las responsabilidades cuando resulte conveniente.
El proyecto debe poder ejecutarse directamente desde:
http://localhost/TP1_Liquidacion_Sueldos/
No debe requerir instalación de Composer, Node.js, paquetes adicionales ni configuración de bases de datos.

11. Caso de prueba obligatorio
Validar el funcionamiento utilizando los siguientes datos:
Datos de entrada:
Categoría: A.   Antigüedad: 1 año.  

Resultados esperados:

Concepto                            Resultado
Sueldo básico                       4050.55
Bonificación antigüedad             405.055
Bonificación presentismo            607.5825
Bonificación dedicación especial    2025.275
Obra social                         354.423125
Aporte jubilatorio                  779.730875
Total haberes                       7088.4625
Total descuentos                    1134.154
Sueldo neto                         5954.3085

Los resultados deben coincidir con los cálculos del sistema de referencia.

12. Entregables solicitados
Generar:
    1. El código fuente completo del microsistema.
    2.Los archivos PHP, HTML y CSS necesarios.
    3. Una estructura de carpetas sencilla.
    4. Instrucciones para ejecutar el proyecto en XAMPP.
    5. Una explicación del funcionamiento de cada archivo.
    6. Una explicación de las principales funciones, variables, estructuras condicionales y operaciones matemáticas utilizadas.
    7. Una guía de pruebas para validar el funcionamiento.

El código debe ser legible, estar organizado y contener comentarios útiles para facilitar su explicación durante una presentación universitaria.

Objetivo final: obtener una aplicación funcional de liquidación de sueldos que respete las reglas matemáticas del trabajo práctico, pueda ejecutarse en localhost y sea lo suficientemente sencilla para que los estudiantes comprendan y expliquen su implementación.
