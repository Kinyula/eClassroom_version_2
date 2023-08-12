              <!-- <table class="table table-border datatable ">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone number</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($users->count() > 0)
                  @foreach ($users as $user )
                  <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td><span class="badge bg-success">{{$user->phone_number}}</span></td>
                    <td><span class="badge bg-success">{{$user->status}}</span></td>
                    <td>
                      <div class="d-flex">
                      <a href="{{ Route('delete',$user->id)}}"><button class=" btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a>
                    <a class="px-2" href=""><button class="  btn btn-success btn-sm"><i class="fas fa-edit"></i></button></a>
                      </div>

                    </td>


                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <th scope="row"></th>
                    <td class="alert alert-danger">No user(s) registered</td>
                  </tr>
                  @endif
            
                </tbody>
              </table> -->


              <!-- --------------------------------------------------------NEXT COMMENTED CODE ---------------- -->


              <!-- start of the other commented code -->

              
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.html">
              <i class="bi bi-circle"></i><span>Form Elements</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>Form Layouts</span>
            </a>
          </li>
          <li>
            <a href="forms-editors.html">
              <i class="bi bi-circle"></i><span>Form Editors</span>
            </a>
          </li>
          <li>
            <a href="forms-validation.html">
              <i class="bi bi-circle"></i><span>Form Validation</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tables-general.html">
              <i class="bi bi-circle"></i><span>General Tables</span>
            </a>
          </li>
          <li>
            <a href="tables-data.html">
              <i class="bi bi-circle"></i><span>Data Tables</span>
            </a>
          </li>
        </ul>
      </li> 

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Chart.js</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>ApexCharts</span>
            </a>
          </li>
          <li>
            <a href="charts-echarts.html">
              <i class="bi bi-circle"></i><span>ECharts</span>
            </a>
          </li>
        </ul>
      </li> End Charts Nav 

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="icons-bootstrap.html">
              <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-remix.html">
              <i class="bi bi-circle"></i><span>Remix Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Boxicons</span>
            </a>
          </li>
        </ul>
      </li> End Icons Nav

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li> End Profile Page Nav

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li> End F.A.Q Page Nav

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li> End Contact Page Nav

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li> End Register Page Nav

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li> End Login Page Nav

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li> End Error 404 Page Nav

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a> 
      </li>



      COURSE MODEL
      
<?php



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name',
        'student_id'
    ];

    public function department(){

        return $this->belongsTo(Department::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }
}

// ITS MIGRATION COLUMN
$table->string('course_name');

// END OF COURSE MODEL


// DEPARTMENT MODEL

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_name',
        'student_id',
        'instructor_id',

    ];


    public function course(){
        return $this->hasMany(Course::class);
    }

    
    public function student(){
        return $this->hasMany(Student::class);
    }

    
    public function instructor(){
        return $this->hasMany(Instructors::class);
    }

}

// ITS MIGRATION

$table->string('department_name');


// END OF DEPARTMENT MODEL


// INSTRUCTOR MODEL


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructors extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'student_id',
        'gender',
        'phone_number'
    ];


    public function student(){
        return $this->hasMany(Student::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }

}

// ITS MIGRATION COLUMNS

$table->foreignId('student_id')->constrained('students')->onDelete('cascade')->onUpdate('cascade');
$table->string('first_name');
$table->string('middle_name');
$table->string('last_name');
$table->string('email');
$table->string('phone_number');
$table->string('gender');
$table->string('status');
$table->string('teaching_course_name');
$table->string('department_name');
// END OF INSTRUCTORS MODEL

// ROLE MODEL


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_name',
        'student_id',
        'instructor_id'
    ];

}

// ITS MIGRATION COLUMN

$table->string('role_name');
// END OF ROLE MODEL

// STUDENT MODEL


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone_number',
        'gender',
        'course_name',
        'department_name',
        'status'
    ];

    public function department(){

        return $this->belongsTo(Department::class);
    }

    public function instructor(){

        return $this->hasMany(Instructors::class);
    }



    public function user(){

        return $this->hasOne(User::class);
    }
}

// ITS MIGRATION COLUMNS

$table->foreignId('role_id')->constrained('roles')->onDelete('cascade')->onUpdate('cascade');
$table->foreignId('course_id')->constrained('courses')->onDelete('cascade')->onUpdate('cascade');
$table->foreignId('department_id')->constrained('departments')->onDelete('cascade')->onUpdate('cascade');
$table->string('first_name');
$table->string('middle_name');
$table->string('last_name');
$table->string('email');
$table->string('phone_number');
$table->string('gender');
$table->string('status');
$table->string('course_name');
// END OF STUDENT MODEL


// USER MODEL

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends \Illuminate\Foundation\Auth\User
{
    use HasFactory;

    protected $fillable = [
        'role_id',
        'student_id',
        'instructor_id',
        'email',
        'password'
    ];

    public function student(){

return $this->belongsTo(Student::class);

    }

    public function instructor(){
        return $this->belongsTo(Instructors::class);
    }
}

// ITS MIGRATION COLUMNS

$table->foreignId('student_id')->constrained('students')->onDelete('cascade')->onUpdate('cascade');
$table->foreignId('student_id')->constrained('students')->onDelete('cascade')->onUpdate('cascade');
$table->string('email');
$table->string('password');
$table->string('role_id');
// END OF USER MODEL





      