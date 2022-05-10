function dropdown()
{
    if (document.getElementsByClassName("dropdown-menu")[0].style.display == "block") 
    {
        document.getElementsByClassName("dropdown-menu")[0].style.display = "none";
    }
    else
    {
        document.getElementsByClassName("dropdown-menu")[0].style.display = "block";
    }
}

function login()
{
    window.location.href = "http://localhost:8000/login.php";
}

function register()
{
    window.location.href = "http://localhost:8000/register.php";
}

function logout()
{
    window.location.href = "http://localhost:8000/logout.php";
}

function dashboard()
{
    window.location.href = "http://localhost:8000/dashboard.php";
}

function match()
{
    window.location.href = "http://localhost:8000/controller/request_match.php?match_result=match";
}

function no_match()
{
    window.location.href = "http://localhost:8000/controller/request_match.php?match_result=no_match";
}

function my_match()
{
    window.location.href = "http://localhost:8000/my_match.php";
}