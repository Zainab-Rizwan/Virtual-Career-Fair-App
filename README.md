<h1 align="center">Virtual Career Fair App</h1>

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/ushnaijaz/Virtual-Career-Fair-App.git">
    <img src="uetlogo.png" alt="Logo" width="80" height="80">
  </a>
 </div>

## Table Of Content

- [Table Of Content](#table-of-content)
- [Project Description](#project-description)
  - [Built With](#built-with)
- [Getting Started](#getting-started)
  - [Installation](#installation)
- [Usage](#usage)
- [Contributers](#contributers)
- [Acknowledgments](#acknowledgments)
- [License](#license)

<!-- PROJECT DESCRIPTION -->
## Project Description

[Live Link](http://www.virtualcareerfairapp.webhoster.com.pk/)

The aim of the project is to develop an interactive web-based application to help candidates find a job that matches their skill set in their desired company. Similarly, companies can also find a perfect fit for the vacant posts by allotting time slots to the candidates and having an online interview with them within a specific time limit.
This project will have four main parts:

- A database that will store all the data about the employers and candidates
- An administrative interface that would allow adding, removing, and editing information of the company and candidate
- An interface for employers where they can see the candidates who applied for the job, can exhibit their posters, and can upload the time slots they will be available at
- Candidates interface where they can apply for the job that matches their interests, upload resumes and can read an intro about the company

### Built With

- [HTML](https://code.visualstudio.com/docs/languages/html)
- [CSS](https://code.visualstudio.com/docs/languages/html)
- [JS](https://vuejs.org/)
- [PHP](https://www.php.net/)
- [MYSQL](https://www.mysql.com/)
- [Bootstrap](https://getbootstrap.com)
- [JQuery](https://jquery.com)

<!-- GETTING STARTED -->
## Getting Started

Install and Run the Project

### Installation

1. Install a code editor [https://code.visualstudio.com/](https://code.visualstudio.com/)
2. Clone the repo

   ```sh
   git clone https://github.com/ushnaijaz/Virtual-Career-Fair-App.git
   ```

3. Install Xampp or Wamp server from [here](https://www.wampserver.com/en/) or [here](https://www.apachefriends.org/download.html).
4. Run the project

<!--HOW TO USE THE PROJECT -->
## Usage

As seen in the use case diagram all the functionalities offered on the web application is only applicable if you are logged in. You can log-in as a recruiter or a student.
First you will create an account by signing-up.

<div align="center">
<img src="usecases.png" alt="usecases" width="600" height="600">
  
</div>

- Recruiter Side

When a recruiter logs in, they will be redirected to their dashboard. They will be able to see all the fairs they have join on their dashboard. They can
edit, delete, update their profile. By clicking a specific career fair, they can post/add/delete/update jobs. They can view the candidates that have joined
that specific career fair. From that, there is an option to view/download the CV of a student and have one-to-one meeting by selecting a time slot.

- Student Side

A student will create their profile first (sign-up). When they will log-in, the page will be redirected to their dashboard.  They will be able to see all the fairs they have join on their dashboard. They can
edit, delete, update their profile. They can join the fairs, upload their CV or use the in-built feature to generate a CV. They can then view all the companies registered in
that specific career fair and apply for jobs.

- Organisers Side

An organiser will have a dashboard in where he can create, read, update, delete career fairs. The recruiter/student will send a request to the organiser to join a fair and
only when the organsier accepts the request, they can join a fair. The organziser will be sent notification each time someone sends a request for joining a fair. They can
create, read, update, delete their profile on their dashboard.

<!-- CONTRIBUTERS -->
## Contributers

This project ows its completion to the sheer hard work and untiring efforts of the team members

- [Ushna Ijaz](https://github.com/ushnaijaz)
- [Saba Saeed](https://github.com/sabasaeed8)
- [Marriam Salman](https://github.com/marriamsalman)
- [Tayyaba Asif](https://github.com/tayyaba-asif)
- [Zainab Rizwan](https://github.com/zainab-rizwan)
- [Arooj Naeem](https://github.com/arooj-naeem)
- [Maryam Nasir](https://github.com/maryamnasir65834)
- [Sayyeda Asma](https://github.com/sayyedaasma)

<!-- ACKNOWLEDGMENTS -->
## Acknowledgments

Use this space to list resources you find helpful and would like to give credit to. I've included a few of my favorites to kick things off!

- [VFairs](https://www.vfairs.com/)
- [Career Fair Plus](https://www.careerfairplus.com/)
- [IBA Virtual Career Fair](https://virtualfair.iba.edu.pk/en)

<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE.txt` for more information.
