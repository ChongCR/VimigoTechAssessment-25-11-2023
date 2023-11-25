<p><h1># South Australia University Student Registry API</h1></p>
<p><b>This Project is built based on the Technical Assessment provided by Vimigo</b>
<br><br>
    <hr>
<h3>Present By</h3>
    <h4>Chong Chun Rock <h4>
    <h4>chongcr-wm20@student.tarc.edu.my</h4>  /     <h4>chongcr128@gmail.com</h4>
    <h4>018-2888835</h4>
    
</p>
<hr>
    

<p><h2> Project Overview</h2><br>
This project is a RESTful API developed for the South Australia University Student Registry. It enables university staff to manage student records. Developed using Laravel, it features comprehensive student data management, authentication for staff, and bulk data operations.</p>

<p><h2>Video</h2>

<h3> https://streamable.com/apr8dh </h3>

<p><h2>Technologies Used</h2>
<ul>
<li>Laravel</li>
<li>Laravel Passport for authentication</li>
<li>MySQL for the database</li>
<li>Postman for API testing</li>
</ul></p>

<p><h2>Features</h2></p>
<ul>
<li>REST APIs for student data management (name, email, study course).</li>
<li>User Authentication for university staff using Laravel Passport.</li>
<li>Search functionality for students by name or email.</li>
<li>Pagination in the index API.</li>
<li>Resource Implementation for controlled data output in the Student Model API.</li>
<li>Excel/CSV File Imports for bulk operations (create, update, delete).</li>
</ul></p>


<p><h2>Installation and Setup</h2>
    
<b>run</b> composer update<br>
<b>run</b> npm install<br>
<b>chg</b> .env.example to .env<br>
<b>run</b> php artisan key:generate<br>
<b>run</b> php artisan migrate<br>
<b>run</b> composer require laravel/passport
<b>run</b> php artisan passport:install


<p><h2>Postman collection</h2>

<b><a href="https://github.com/ChongCR/VimigoTechAssessment-25-11-2023/blob/master/Vimigo%20Assessment.postman_collection.json" target="_blank">VimigoTech Assessment Postman Collection</a><br>



