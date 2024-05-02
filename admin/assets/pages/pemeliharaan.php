<section class="tasks">
      <div class="section-title-wrapper">
        <h2 class="section-title">Pemeliharaan</h2>
      </div>

      <ul class="tasks-list">

      <li class="tasks-item">
        <div id="grafiksensor">
           
        </div>
         
        </li>

        <li class="tasks-item">
          <div class="card task-card">

            <div class="card-input">
              <input type="checkbox" name="task-1" id="task-1" onchange="ubahstatus(this.checked)" <?php if ($relay == 1) echo "checked"; ?>>

              <label for="task-1" class="task-label">
                Kuras Air Lingkungan Budidaya Ikan Nila
              </label>
          
            </div>
            <span id="statlv"></span>

            <ul class="card-meta-list">

              <li>
                <div class="meta-box icon-box">
                  <span class="material-symbols-rounded  icon" >water</span>

                  <span id="ceklv">0</span>
                </div>
              </li>

              <!-- <li>
                <div class="meta-box icon-box">
                  <span class="material-symbols-rounded  icon">comment</span>

                  <data value="21">21</data>
                </div>
              </li> -->

              <li>
                <span id="status">

                </span>


              </li>

            </ul>

          </div>
        </li>
        
        

        <!-- ==================================== -->


        
        <li class="tasks-item">
          <div class="card task-card">

            <div class="card-input">
              <input type="checkbox" name="task-1" id="task-1" onchange="ubahstatusrelay(this.checked)" <?php if ($relaysecond == 1) echo "checked"; ?>>

              <label for="task-1" class="task-label">
                Isi Air Lingkungan Budidaya Ikan Nila
              </label>
          
            </div>
            <span id="statvol"></span>

            <ul class="card-meta-list">

              <li>
                <div class="meta-box icon-box">
                  <span class="material-symbols-rounded  icon" >water</span>

                  <span id="cekvol">0</span>
                </div>
              </li>

              <!-- <li>
                <div class="meta-box icon-box">
                  <span class="material-symbols-rounded  icon">comment</span>

                  <data value="21">21</data>
                </div>
              </li> -->

              <li>
                <span id="statusrelay">

                </span>


              </li>

            </ul>

          </div>
        </li> 
      </ul>
    </section>



