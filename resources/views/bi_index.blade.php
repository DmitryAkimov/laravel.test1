@extends('layout.mainlayout')

@section('content')
<style>
  .card {
    margin-bottom: 0.5em;
  }

  a {
    color:black;
  }
</style>

<div class="container">
  <div class="row">
    <div class="col-6">
      <div class="card">
        <div class="card-header">ИСУП</div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <a href="http://msql-5/ReportServer/Pages/ReportViewer.aspx?/PWA/pwa_mng_milestones" target="_blank">
                <i class="fa fa-table"></i>
                Управленческие <b>вехи</b>
              </a> </li>
            <li class="list-group-item">

              <a href="http://msql-5/ReportServer?/MDM/mdm-project-execution-plan-nearest" target="_blank">
                <i class="fa fa-file-alt"></i>
                <b>Производственный</b>&#160;план (договорные этапы)</a>
            </li>

            <li class="list-group-item">

              <a href="http://msql-5/ReportServer/Pages/ReportViewer.aspx?/PWA/pwa_portfolio" target="_blank">
                <i class="fas fa-briefcase"></i>
                <b>Портфель</b> проектов ИСУП</a>
            </li>

          </ul>

        </div>
      </div>
    </div>

    <div class="col-6">
      <div class="card">
        <div class="card-header">Загрузка</div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <a href="http://msql-5/ReportServer?/MDM/mdm-timesheets-projects" target="_blank">
                <i class="fa fa-file-alt"></i>
                Загрузка по проекту-исполнителям</a>
            </li>
            <li class="list-group-item">
              <a href="http://msql-5/ReportServer?/MDM/mdm-timesheets-groups" target="_blank">
                <i class="fa fa-file-alt"></i>
                Загрузка по подразделениям-проектам</a>
            </li>

            
            
            <li class="list-group-item">

              <a href="http://msql-5/ReportServer?/MDM/mdm-timesheets-sectors-experience" target="_blank">
                <i class="fas fa-chart-pie"></i>
                Опыт работы по секторам</a>
            </li>
            <li class="list-group-item">
              <a href="http://msql-5/ReportServer?/MDM/mdm-timesheets-analyze-chart" target="_blank">
                <i class="far fa-chart-bar"></i>
                Свод за год</a>
            </li>
            <li class="list-group-item">
              <a href="https://bitrix.spgr.ru/company/mdm" target="_blank">
                <i class="fa fa-table"></i>
                Список проектов</a>
            </li>
          </ul>
          
        </div>
      </div>
    </div>

    <div class="col-6">
      <div class="card">
        <div class="card-header">Битрикс</div>
        <div class="card-body">
          <!--       <h4 class="card-title">Заголовок карточки</h4> -->
          <p class="card-text">
            <a href="http://msql-5/ReportServer?/BITRIX/bitrix-tasks" target="_blank">
              <i class="fas fa-tasks"></i>
              <b>Битрикс</b>&#160;задачи</a></p>
        </div>
      </div>
    </div>

    <div class="col-6">
      <div class="card">
        <div class="card-header">СКУД</div>
        <div class="card-body">
          <!--  <h4 class="card-title">Заголовок карточки</h4> -->
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <a href="http://msql-5/ReportServer?/SIGUR/sigur_pivot_days" target="_blank">
                <b>СКУД</b>&nbsp;данные</a>
            </li>
            <li class="list-group-item">
              <a href="http://msql-5/ReportServer?/SIGUR/sigur_pivot_days" target="_blank">
                <i class="fas fa-hourglass-end"></i>
                Опоздания за сегодня</a>
            </li>
          </ul>

        </div>
      </div>
    </div>

  </div>

  <div class="row mt-3 mb-3">
    <div class="col-6">
      <div class="card">
        <div class="card-header">Управленческие отчёты</div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">

              <a href="http://msql-5/ReportServer/Pages/ReportViewer.aspx?/MDM/mdm-project-execution-delay-monthly" target="_blank">
                <i class="far fa-chart-bar"></i>
                <b>Просрочка выполнения</b> проектов помесячно</a></li>
            <li class="list-group-item">
              <a href="http://msql-5/ReportServer?/FIN/fin-projects-portfolio">
                <i class="fas fa-ruble-sign"></i>
                Портфель проектов</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div id="accordion" class="col-12 mt-3 mb-3">
      <div class="card">
        <div class="card-header" id="headingThree">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Устаревшие отчёты
            </button>
          </h5>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
          <div class="card-body">
            <p style="margin: 10px;">​<a href="http://sp13-database/ReportServer/Pages/ReportViewer.aspx?/SharePoint/PJ_Report1" target="_blank">
                01 Плановая доступность % помесячно</a></p>
            <p>​<a href="http://sp13-database/ReportServer/Pages/ReportViewer.aspx?/SharePoint/PJ_Report4&amp;rs:Command=Render" target="_blank">
                04 План работ по дням</a></p>
            <p>
              <a href="http://sp13-database/ReportServer/Pages/ReportViewer.aspx?/SharePoint/PJ_Report5" target="_blank">
                05 Достаточность ресурсов</a></p>
            <p>
              <a href="http://sp13-database/ReportServer/Pages/ReportViewer.aspx?/SharePoint/PJ_Report17&amp;rs:Command=Render" target="_blank">
                17 Доступность ресурсов</a></p>
            <hr>
            <p>
              <a href="http://msql-5/ReportServer?/MDM/mdm_grades" target="_blank">
                <b>ABC</b> Полученные оценки</a></p>

          </div>
        </div>
      </div>
    </div>


  </div>

@endsection