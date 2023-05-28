<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HIVE</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos//HIVE-logo_Tbg.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between mb-5 pt-3">
          <a href="./admin-home.php" class="text-nowrap logo-img">
            <img src="../assets/images/logos/HIVE-logo_Tbg.png" width="70" alt="Hive Logo" />
            <span style="color:gold; font-weight:bold;">HIVE</span>
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="sidebar-item">
              <a class="sidebar-link" href="./admin-home.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./member-management.php" aria-expanded="false">
                <span>
                  <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Member Management</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./course-management.php" aria-expanded="false">
                <span>
                  <i class="ti ti-book"></i>
                </span>
                <span class="hide-menu">Course Management</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./registration.php" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Registration</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./feedback.php" aria-expanded="false">
                <span>
                  <i class="ti ti-message-dots"></i>
                </span>
                <span class="hide-menu">User Feedback</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./reports.php" aria-expanded="false">
                <span>
                  <i class="ti ti-clipboard-data"></i>
                </span>
                <span class="hide-menu">Generate Report</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->

    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <!-- Icon That Toggle Side Menu When Clicked in Small Screen -->
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item nav-item-pageTitle">
              <a class="nav-link" href="#">
                <i class="ti ti-clipboard-data"></i>
                <span class="d-none d-lg-inline">Reports</span>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="logout.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <h1 class="mt-4">Reports</h1>
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card shadow">
              <div class="card-body">
                <div class="report-card">
                  <div id="chart"></div>
                  <div class="form-group mt-4 text-center">
                    <label for="chartTypeDropdown">Select Chart Type:</label>
                    <select class="form-control btn btn-primary" id="chartTypeDropdown" onchange="chartSelection(this.value)">
                      <option value="default">Overall User Progress</option>
                      <option value="averageScore">Average Score Quiz</option>
                      <option value="registeredUser">Registered User</option>
                      <option value="feedbackRating">Feedback Rating</option>
                    </select>
                  </div>
                </div>
              </div> 
            </div>
          </div>       
        </div>
      </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>

  <?php
    $con = mysqli_connect("localhost", "root", "", "hive");

    if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
    }

    //report overall user progress
    $query = "SELECT Status, COUNT(*) AS total FROM membertakequiz GROUP BY Status";
    $result = mysqli_query($con, $query);

    // Check if the query executed successfully
    if (!$result) {
      die("Query failed: " . mysqli_error($con));
    }

    $overallProgressData = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $overallProgressData[] = [
        'status' => $row['Status'],
        'total' => $row['total']
      ];
    }

    // Report registered user monthly
    $query = "SELECT MONTH(CreatedDate) AS month, COUNT(*) AS total FROM member GROUP BY MONTH(CreatedDate) ORDER BY month ASC";
    $result = mysqli_query($con, $query);

    if (!$result) {
      die("Query failed: " . mysqli_error($con));
    }

    $registeredUserData = [];
    $monthNames = [
      1 => 'Jan',
      2 => 'Feb',
      3 => 'Mar',
      4 => 'Apr',
      5 => 'May',
      6 => 'Jun',
      7 => 'Jul',
      8 => 'Aug',
      9 => 'Sep',
      10 => 'Oct',
      11 => 'Nov',
      12 => 'Dec'
    ];

    while ($row = mysqli_fetch_assoc($result)) {
      $registeredUserData[] = [
        'month' => $monthNames[$row['month']],
        'total' => $row['total']
      ];
    }

    // Report average score per Quizzez
    $query = "SELECT QuizID, AVG(Score) AS average_score FROM membertakequiz WHERE Status = 'Completed' GROUP BY QuizID";
    $result = mysqli_query($con, $query);

    // Check if the query executed successfully
    if (!$result) {
      die("Query failed: " . mysqli_error($con));
    }

    $averageScoreData = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $averageScoreData[] = [
        'quiz' => $row['QuizID'],
        'avg_score' => $row['average_score']
      ];
    }

    //report for rating
    $query = "SELECT Rating, COUNT(*) AS total FROM feedback GROUP BY Rating ORDER BY Rating DESC";
    $result = mysqli_query($con, $query);
    
    if (!$result) {
      die("Query failed: " . mysqli_error($con));
    }
    
    $feedbackData = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $feedbackData[] = [
        'rating' => $row['Rating'],
        'total' => $row['total']
      ];
    }
    mysqli_close($con);

    // Generate the chart using ApexCharts library
    echo '<script>
    //chart default (overall progress)
    const data = ' . json_encode($overallProgressData) . ';
    const options = {
      series: [{
        name: "Total",
        data: data.map(item => item.total),
      }],
      chart: {
        height: 350,
        type: "bar",
        toolbar: {
          show: true
        }
      },
      plotOptions: {
        bar: {
          borderRadius: 10,
          dataLabels: {
            position: "top",
          },
        }
      },
      dataLabels: {
        enabled: true,
        offsetY: -20,
        style: {
          fontSize: "12px",
          colors: ["#008FFB"]
        },
        formatter: function (val) {
          return val;
        }
      },
      xaxis: {
        categories: data.map(item => item.status),
        position: "bottom",
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        crosshairs: {
          fill: {
            type: "gradient",
            gradient: {
              colorFrom: "#D8E3F0",
              colorTo: "#BED1E6",
              stops: [0, 100],
              opacityFrom: 0.4,
              opacityTo: 0.5,
            }
          }
        },
        tooltip: {
          enabled: true,
        }
      },
      colors: ["#008FFB"],
      yaxis: {
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false,
        },
        labels: {
          show: false,
        }
      },          
      title: {
        text: "Overall User Progress",
        align: "center",
        style: {
          color: "#444",
          fontSize: "14px",
          fontWeight: "bold",
          fontFamily: "Arial, sans-serif",
        }
      }
    };

    const chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();

    
    function chartSelection(chartSelected) {
      if (chart) {
        chart.destroy();
      }

      if (chartSelected === "feedbackRating") {
        const feedbackData = '.json_encode($feedbackData).';
        const options = {
          series: [{
            data: feedbackData.map(item => item.total),
            name:"Total",
          }],
          chart: {
            height: 350,
            type: "bar",
            toolbar: {
              show: true, 
            },
          },
          plotOptions: {
            bar: {
              borderRadius: 4,
              horizontal: true,
            },
          },
          dataLabels: {
            enabled: false,
          },
          xaxis: {
            categories: feedbackData.map(item => item.rating),
            name: "Rating",
            title: {
              text: "Total",
              style: {
                fontSize: "14px",
                fontWeight: 600,
              },
            },
          },
          colors: ["#FF4560"],
          yaxis: {
            title: {
              text: "Rating",
              style: {
                fontSize: "14px",
                fontWeight: 600,
              },
            },
          },
          title: {
            text: "Rating feedback given by user",
            align: "center",
            style: {
              color: "#444",
              fontSize: "14px",
              fontWeight: "bold",
              fontFamily: "Arial, sans-serif",
            }
          }
        };
        const chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      } else if (chartSelected === "registeredUser") {
        // Chart user progress
        const data = ' . json_encode($registeredUserData) . ';
        const options = {
          series: [{
            name: "Total",
            data: data.map(item => item.total),
          }],
          chart: {
            height: 350,
            type: "bar",
            toolbar: {
              show: true
            }
          },
          plotOptions: {
            bar: {
              borderRadius: 10,
              dataLabels: {
                position: "top",
              },
            }
          },
          dataLabels: {
            enabled: true,
            offsetY: -20,
            style: {
              fontSize: "12px",
              colors: ["#304758"]
            }
          },
          xaxis: {
            categories: data.map(item => item.month),
            position: "bottom",
            axisBorder: {
              show: false
            },
            axisTicks: {
              show: false
            },
            crosshairs: {
              fill: {
                type: "gradient",
                gradient: {
                  colorFrom: "#D8E3F0",
                  colorTo: "#BED1E6",
                  stops: [0, 100],
                  opacityFrom: 0.4,
                  opacityTo: 0.5,
                }
              }
            },
            tooltip: {
              enabled: true,
            }
          },
          colors: ["#FEB019"],
          yaxis: {
            axisBorder: {
              show: false
            },
            axisTicks: {
              show: false,
            },
            labels: {
              show: false,
            }
          },
          title: {
            text: "Registered user monthly",
            align: "center",
            style: {
              color: "#444",
              fontSize: "14px",
              fontWeight: "bold",
              fontFamily: "Arial, sans-serif",
            }
          }
        };
        const chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      }else if (chartSelected === "averageScore") {
        // Chart averageScore
        const data = ' . json_encode($averageScoreData) . ';
        const options = {
          series: [{
            name: "Average Score",
            data: data.map(item => item.avg_score),
          }],
          chart: {
            height: 350,
            type: "bar",
            toolbar: {
              show: true
            }
          },
          plotOptions: {
            bar: {
              borderRadius: 10,
              dataLabels: {
                position: "top", 
              },
            }
          },
          dataLabels: {
            enabled: true,
            formatter: function (val) {
              return val + "%";
            },
            offsetY: -20,
            style: {
              fontSize: "12px",
              colors: ["#00E396"]
            }
          },
          xaxis: {
            categories: data.map(item => item.quiz),
            position: "bottom",
            axisBorder: {
              show: false
            },
            axisTicks: {
              show: false
            },
            crosshairs: {
              fill: {
                type: "gradient",
                gradient: {
                  colorFrom: "#D8E3F0",
                  colorTo: "#BED1E6",
                  stops: [0, 100],
                  opacityFrom: 0.4,
                  opacityTo: 0.5,
                }
              }
            },
            tooltip: {
              enabled: true,
            }
          },
          colors: ["#00E396"],
          yaxis: {
            axisBorder: {
              show: false
            },
            axisTicks: {
              show: false,
            },
            labels: {
              show: false,
              formatter: function (val) {
                return val + "%";
              }
            }
          },
          title: {
            text: "Average score for each quiz",
            align: "center",
            style: {
              color: "#444",
              fontSize: "14px",
              fontWeight: "bold",
              fontFamily: "Arial, sans-serif",
            }
          }
        };
        const chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      }else{
        //chart default (overall progress)
        const data = ' . json_encode($overallProgressData) . ';
        const options = {
          series: [{
            name: "Total",
            data: data.map(item => item.total),
          }],
          chart: {
            height: 350,
            type: "bar",
            toolbar: {
              show: true
            }
          },
          plotOptions: {
            bar: {
              borderRadius: 10,
              dataLabels: {
                position: "top",
              },
            }
          },
          dataLabels: {
            enabled: true,
            offsetY: -20,
            style: {
              fontSize: "12px",
              colors: ["#008FFB"]
            },
            formatter: function (val) {
              return val;
            }
          },
          xaxis: {
            categories: data.map(item => item.status),
            position: "bottom",
            axisBorder: {
              show: false
            },
            axisTicks: {
              show: false
            },
            crosshairs: {
              fill: {
                type: "gradient",
                gradient: {
                  colorFrom: "#D8E3F0",
                  colorTo: "#BED1E6",
                  stops: [0, 100],
                  opacityFrom: 0.4,
                  opacityTo: 0.5,
                }
              }
            },
            tooltip: {
              enabled: true,
            }
          },
          colors: ["#008FFB"],
          yaxis: {
            axisBorder: {
              show: false
            },
            axisTicks: {
              show: false,
            },
            labels: {
              show: false,
            }
          },
          title: {
            text: "Overall User Progress",
            align: "center",
            style: {
              color: "#444",
              fontSize: "14px",
              fontWeight: "bold",
              fontFamily: "Arial, sans-serif",
            }
          }
        };
    
        const chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      }
  }
</script>';
?>



</body>

</html>