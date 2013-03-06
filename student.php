<?php
session_start();
include_once 'settings.php';
include_once 'api.php';

$api = new API(BASE_API, $_SESSION['access_token'], $_SESSION['code']);

$student = $api->execute(sprintf('students/%s', $_GET['id']));

print '<html>';
print '<head>';
print sprintf('<title>Student - %s %s</title>', $student->name->firstName, $student->name->lastSurname);
print '<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">';
print '<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>';
print '<script src="http://twitter.github.com/bootstrap/assets/js/bootstrap.js"></script>';
print '</head>';
print '<body>';
print '<div class="row" style="padding-top: 2%;">';
print '<div class="span3 offset1 well well-small">';
print '<img src="img/userp.png">';
print '</div>';
print '<div class="span2">';
print '<p>';
print sprintf('<strong>Full Name:</strong> %s %s %s <small>%s</small>', $student->name->firstName, ($student->name->middleName != null ? $student->name->middleName : ''), $student->name->lastSurname, ($student->name->generationCodeSuffix != null ? $student->name->generationCodeSuffix : ''));
$today = new DateTime();
$bday = new DateTime($student->birthData->birthDate);
$age = $today->diff($bday);
print sprintf('<br/><strong>Age:</strong> ' . $age->y);
print '<br/><strong>Sex:</strong> ' . $student->sex;
print '<br/><strong>Race:</strong> ' . $student->race != null ? $student->race : 'N/A';
print '<br/><strong>Disabilities:</strong> ' . $student->section504Disabilities != null ? $student->section504Disabilities : 'N/A';
print '<br/><strong>Absences:</strong> 2';
print '<br/><strong>Overall GPA:</strong> 2.87';
print '</p>';
print '</div>';
print '</div>';
print '<div class="row">';
print '<div class="span4 offset2">';
print '<table class="table table-bordered">';
print '<thead>';
print '<tr>';
print '<th>Class Name</th>';
print '<th>Current Grade</th>';
print '</tr>';
print '</thead>';
print '<tbody>';
print '<tr>';
print '<td>English</td>';
print '<td>83</td>';
print '</tr>';
print '<tr>';
print '<td>History</td>';
print '<td>90</td>';
print '</tr>';
print '<tr>';
print '<td>Math</td>';
print '<td>74</td>';
print '</tr>';
print '<tr>';
print '<td>PE</td>';
print '<td>97</td>';
print '</tr>';
print '<tr>';
print '<td>Science</td>';
print '<td>87</td>';
print '</tr>';
print '</tbody>';
print '</table>';
print '</div>';
print '</body>';
print '</html>';
?>
