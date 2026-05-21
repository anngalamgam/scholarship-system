<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<style>

@page{
    size: 8.5in 13in;
    margin: 0.12in;
}
.checkbox{
    display:inline-block;
    width:12px;
    height:12px;
    border:1px solid #000;
    text-align:center;
    line-height:12px;
    font-size:10px;
    font-weight:bold;
    vertical-align:middle;
    margin:0 3px;
}
body{
    font-family: Arial, Helvetica, sans-serif;
    font-size:10px;
    margin:0;
    padding:0;
    background:#fff;
}
.org-row td{
    border:1px solid #000;
    height:20px;
    padding:8px;
}
.paper{
    width:100%;
    height:12.7in;
    border:2px solid #000;
    background:#efefef;
    position:relative;
}

table{
    width:100%;
    border-collapse:collapse;
    table-layout:fixed;
}

td{
    border:1px solid #000;
    padding:3px;
    vertical-align:middle;
    word-wrap:break-word;
}

.center{
    text-align:center;
}

.bold{
    font-weight:bold;
}

.upper{
    text-transform:uppercase;
}
.header-title{
    font-size:30px;
    font-weight:900;
    color:#1737ff;
    line-height:1;
}

.program-title{
    font-size:13px;
    font-weight:bold;
    margin-top:4px;
}

.application{
    font-size:38px;
    font-weight:900;
    margin-top:2px;
    line-height:1;
}

.student-profile{
    display:inline-block;
    background:#fff200;
    color:#1737ff;
    font-size:32px;
    font-weight:900;
    padding:4px 14px;
    margin-top:6px;
}

.section-purple{
    background:#ff00ff;
    color:#fff;
    font-size:18px;
    font-weight:900;
    padding-left:5px;
}

.section-blue{
    background:#003cff;
    color:#fff;
    font-size:18px;
    font-weight:900;
    padding-left:5px;
}

.section-green{
    background:#00c83a;
    color:#fff;
    font-size:18px;
    font-weight:900;
    padding-left:5px;
}

.note{
    font-style:italic;
    font-size:10px;
    padding:4px;
}

.line{
    display:inline-block;
    border-bottom:1px solid #000;
    min-width:100px;
    text-align:center;
    font-weight:bold;
}

.line-left{
    text-align:left;
    padding-left:4px;
}

.checkbox{
    display:inline-block;
    width:11px;
    height:11px;
    border:2px solid #4a6ea9;
    text-align:center;
    line-height:10px;
    font-size:9px;
    font-weight:bold;
    vertical-align:middle;
    margin:0 2px;
}

.small{
    font-size:7px;
    text-align:center;
}

.org-row{
    height:24px;
}

.sibling-row{
    height:24px;
}

.signature{
    text-align:center;
    font-style:italic;
    font-weight:bold;
    margin-bottom:70px;
}

.signature-line{
    border-top:1px solid #000;
    width:220px;
    margin:auto;
    padding-top:3px;
}

</style>

</head>

<body>

<div class="paper">

<!-- HEADER -->

<table style="width:100%; border-collapse:collapse;">

<tr>

<td width="12%" class="center" style="border:1px solid #ffffff; padding:8px;">
    <img src="{{ $pesoLogo }}" style="width:80px;">
</td>

<td width="12%" class="center" style="border:1px solid #ffffff; padding:8px;">
    <img src="{{ $aparri }}" style="width:80px;">
</td>

<td width="51%"
    class="center"
    style="border:1px solid #fffcfc;
           padding:8px 5px;">

    <div class="header-title upper">
        MUNICIPALITY OF APARRI
    </div>

    <div class="program-title upper">
        LGU APARRI SCHOLARSHIP PROGRAM 2026
    </div>

    <div class="application upper">
        APPLICATION FORM
    </div>

    <div class="student-profile upper">
        STUDENT PROFILE
    </div>

</td>
<td width="25%"
    class="center bold"
    style="
        border:1px solid #000;
        height:160px;
        text-align:center;
        vertical-align:middle;
    ">

    <div style="
        width:3.5cm;
        height:4.5cm;
        border:2px dashed #000;
        margin:auto;
        background:#fff;
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
        text-align:center;
        font-size:12px;
        line-height:1.4;
        padding:5px;
        box-sizing:border-box;
    ">

        PASSPORT SIZE<br>
        OR 2&quot; x 2&quot;<br><br>

        LATEST FRONT<br>
        FACING PHOTO

    </div>

</td>
</tr>

</table>

<!-- NOTE -->

<table>

<tr>

<td class="note">

Please complete in BLOCK CAPITALS,
write legibly, use ballpen and avoid erasure.

</td>

</tr>

</table>

<!-- PERSONAL DATA -->

<table>

<tr>

<td class="section-purple">
PERSONAL DATA
</td>

</tr>

</table>

<!-- NAME -->

<table>

<tr>

<td width="38%"  height="30px" class="center">

<div class="line" style="width:95%;">
{{ strtoupper($record->last_name) }}
</div>

<div class="small">
Family Name
</div>

</td>

<td width="38%" height="30px" class="center">

<div class="line" style="width:95%;">
{{ strtoupper($record->first_name) }}
</div>

<div class="small">
First Name
</div>

</td>

<td width="24%" height="20px" class="center">

<div class="line" style="width:95%;">
{{ strtoupper($record->middle_name) }}
</div>

<div class="small">
Middle Name
</div>

</td>

</tr>

</table>

<!-- BIRTH -->

<table>

<tr>

<td width="25%" height="20px">

Date of Birth :

<span class="line">
{{ strtoupper($record->birth_date) }}
</span>

</td>

<td width="30%">

Place of Birth :

<span class="line">
{{ strtoupper($record->place_of_birth) }}
</span>

</td>

<td width="18%">

Age :

<span class="line">
{{ strtoupper($record->age) }}
</span>

</td>

<td width="30%">

Religion :

<span class="line">
{{ strtoupper($record->religion) }}
</span>

</td>

</tr>

</table>

<!-- SEX -->

<table>

<tr>

<td width="40%" height="20px">

Sex
<span class="checkbox">
    {{ strtolower($record->gender) == 'male' ? '/' : '' }}
</span>

Male

<span class="checkbox">
    {{ strtolower($record->gender) == 'female' ? '/' : '' }}
</span>

Female

</td>

<td width="60%">

Contact No.

<span class="line">
{{ strtoupper($record->contact_number) }}
</span>

</td>

</tr>

</table>

<!-- FB -->

<table>

<tr>

<td width="50%" height="20px">

FB Account :

<span class="line">
{{ strtoupper($record->facebook) }}
</span>

</td>

<td width="50%">

Email Address :

<span class="line">
{{ strtolower($record->email) }}
</span>

</td>

</tr>

</table>

<!-- ADDRESS -->

<table>

<tr>

<td width="50%" height="20px">

Present Address :

<span class="line line-left" style="width:80%;">
{{ strtoupper($record->address) }}
</span>

</td>

</tr>

<tr>

<td width="50%" height="20px">

Permanent Address :

<span class="line line-left" style="width:77%;">
{{ strtoupper($record->permanent_address ?? '') }}
</span>

</td>

</tr>

</table>

<!-- EDUCATION -->

<table>

<tr>

<td colspan="3" class="section-blue">
EDUCATION DATA
</td>

</tr>

<tr>

<td width="60%" class="center bold">
SCHOOL
</td>

<td width="20%" class="center bold">
YEAR GRADUATED
</td>

<td width="20%" class="center bold">
GEN. AVERAGE
</td>

</tr>

<tr>

<td width="50%" height="20px">
Elementary : {{ strtoupper($record->elementary_school) }}
</td>

<td class="center">
{{ strtoupper($record->elementary_year) }}
</td>

<td class="center">
{{ strtoupper($record->elementary_average) }}
</td>

</tr>

<tr>

<td width="50%" height="20px">
Secondary : {{ strtoupper($record->highschool_school) }}
</td>

<td class="center">
{{ strtoupper($record->highschool_year) }}
</td>

<td class="center">
{{ strtoupper($record->secondary_average) }}
</td>

</tr>

<tr>

<td width="50%" height="20px">
Tertiary : {{ strtoupper($record->college_school) }}
</td>

<td class="center">
{{ strtoupper($record->college_year) }}
</td>

<td class="center">
{{ strtoupper($record->college_average) }}
</td>

</tr>

<tr>

<td colspan="3">

Course :

<span class="line" style="width:250px;">
{{ strtoupper($record->college_course) }}
</span>

</td>

</tr>

<tr>

<td colspan="3">

Are you currently a beneficiary of any other scholarship
program or educational assistance?

_____ No

_____ Yes

</td>

</tr>

<tr>

<td colspan="3">

If yes, pls. provide details :

<span class="line" style="width:450px;"></span>

</td>

</tr>

<tr>

<td colspan="3"
style="color:red;font-style:italic;font-weight:bold;">

Organizations you are a member of:

</td>

</tr>

<tr>

<td class="center bold">
Name of Organization
</td>

<td colspan="2" class="center bold">
Position
</td>

</tr>

@for($i=0;$i<2;$i++)

<tr class="org-row">

<td style="height:20px;"></td>

<td colspan="2" style="height:20px;"></td>

</tr>

@endfor

</table>

<!-- FAMILY -->

<table>

<tr>

<td colspan="4" class="section-green">
FAMILY DATA
</td>

</tr>

<tr>

<td width="15%" class="center bold">
&nbsp;
</td>

<td width="25%" class="center bold">
STATUS
</td>

<td width="35%" class="center bold">
NAME
</td>

<td width="25%" class="center bold">
OCCUPATION
</td>

</tr>

<tr>

<td class="bold">
FATHER
</td>

<td>

<span class="checkbox">
{{ strtolower($record->father_status ?? '') == 'living' ? '✓' : '' }}
</span>

Living

<span class="checkbox">
{{ strtolower($record->father_status ?? '') == 'deceased' ? '✓' : '' }}
</span>

Deceased

</td>

<td class="center upper">
{{ strtoupper($record->father_name) }}
</td>

<td class="center upper">
{{ strtoupper($record->father_occupation) }}
</td>

</tr>

<tr>

<td class="bold">
MOTHER
</td>

<td>

<span class="checkbox">
{{ strtolower($record->mother_status ?? '') == 'living' ? '✓' : '' }}
</span>

Living

<span class="checkbox">
{{ strtolower($record->mother_status ?? '') == 'deceased' ? '✓' : '' }}
</span>

Deceased

</td>

<td class="center upper">
{{ strtoupper($record->mother_name) }}
</td>

<td class="center upper">
{{ strtoupper($record->mother_occupation) }}
</td>

</tr>

<tr>

<td colspan="2">

Contact Number :

<span class="line" style="width:150px; height:15px;">
{{ strtoupper($record->guardian_contact) }}
</span>

</td>

<td colspan="2">

Number of Children in the Family :

<span class="line" style="width:60px; height:15px;">
{{ strtoupper($record->number_of_children ?? '') }}
</span>

</td>

</tr>

<tr>

<td colspan="2">

Total Annual Family Income :

<span class="line" style="width:120px; height:15px;">
{{ strtoupper($record->annual) }}
</span>

</td>

<td colspan="2">

Guardian Name :

<span class="line" style="width:150px; height:15px;">
{{ strtoupper($record->guardian_name ?? '') }}
</span>

</td>

</tr>

<tr>

<td class="center bold">
Name of Sibling/s (Eldest to Youngest)
</td>

<td class="center bold">
Age
</td>

<td class="center bold">
Highest Educational Attainment
</td>

<td class="center bold">
School
</td>

</tr>

@for($i=0;$i<8;$i++)

<tr class="sibling-row">

<td style="height:20px; width:40%;"></td>

<td style="width:10%;"></td>

<td style="width:25%;"></td>

<td style="width:25%;"></td>

</tr>

@endfor

</table>

<!-- AFFIRMATION -->

<div style="
    position:absolute;
    bottom:18px;
    left:0;
    width:100%;
">

    <div class="signature">

        I hereby affirm that the information above are true and correct
        to the best of my knowledge.

    </div>

    <table style="width:100%; border:none;">

        <tr>

            <td width="50%"
                style="border:none;"
                align="center">

                <div style="
                    width:220px;
                    border-top:1px solid #000;
                    margin:auto;
                    padding-top:3px;
                ">

                    Date

                </div>

            </td>

            <td width="50%"
                style="border:none;"
                align="center">

                <div style="
                    width:220px;
                    border-top:1px solid #000;
                    margin:auto;
                    padding-top:3px;
                ">

                    Signature Over PRINTED NAME

                </div>

            </td>

        </tr>

    </table>

</div>

</body>
</html>