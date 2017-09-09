  <!-- End of Table-to-load-the-data Part -->
            <!-- Modal (Pop up when detail button clicked) -->
            <div class="modal animated slideInRight" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
  <div class="modal-body">
<div class="steps" id="steps">
            <span class="step_nb"></span>
            <p class="form_title">Enter V-Log information</p>
            <form action="http://vlogplanner.patrickhenry.us:8080/vlog/entry" method="post" >
              <ul>
                <li class="current_step">

                  <input name="title" placeholder="title" type="text"></input>
                  <textarea name="desc" placeholder="desc"></textarea>
                  <input name="preperation" placeholder="preperation" type="text"></input>
                  <input name="materials" placeholder="materials" type="text"></input>
                  <input name="series" placeholder="series" type="text"></input>
                  <input name="no" placeholder="series" type="text"></input>

                </li>
                <li>
                  <input name="intro" placeholder="intro" type="text"></input>
                  <input name="main" placeholder="main" type="text"></input>
                  <input name="outro" placeholder="outro" type="text"></input>
                  <input name="titles" placeholder="titles" type="text"></input>
                  <input name="credits" placeholder="credits" type="text"></input>     
                </li>
                <li>
                  <label>filmed</label>
                  <input name="filmed" placeholder="filmed" type="date"></input>
                  <label>uploaded</label>

                  <input name="uploaded" placeholder="uploaded" type="date"></input>
                  <label>scheduled</label>
                  <input name="scheduled" placeholder="scheduled" type="date"></input>
                </li>
                <li>
                  <input name="tags" placeholder="tags" type="text"></input>
                  <input name="links" placeholder="links" type="text"></input>
                  <input name="sites" placeholder="sites" type="text"></input>
                  <input name="social" placeholder="socials medias sites" type="text"></input>
                  <button type="submit" class="btn btn-primary">Submit</button>

                </li>

              </ul>
            </form>
            <span class="note">Note : you can hit "Enter" to move to next step</span>
      </div>
  </div>

                    </div>
                </div>
            </div>
        </div>