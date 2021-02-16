<section id="topFeature">
      <div class="row">
        <!-- Start Single Top Feature -->
        <div class="col-lg-4 col-md-4">
          <div class="row">
            <div class="single-top-feature">
              <span class="fa fa-flask"></span>
              <h3>Emergency Care</h3>
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
              <div class="readmore_area">
                <a href="#" data-hover="Read More"><span>Read More</span></a>
              </div>
            </div>
          </div>
        </div>
        <!-- End Single Top Feature -->
         
        <!-- Start Single Top Feature -->
        <div class="col-lg-4 col-md-4">
          <div class="row">
            <div class="single-top-feature opening-hours">
              <span class="fa fa-clock-o"></span>
              <h3>Opening Hours</h3>
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh.</p>
              <ul class="opening-table">
                <li>
                  <span>Monday - Friday</span>
                  <div class="value">8.00 - 16.00</div>
                </li>
                <li>
                  <span>Saturday</span>
                  <div class="value">9.30 - 15.30</div>
                </li>
                <li>
                  <span>Sunday</span>
                  <div class="value">9.30 - 17.00</div>
                </li>
              </ul>              
            </div>
          </div>
        </div>
        <!-- End Single Top Feature -->

        <!-- Start Single Top Feature -->
        <div class="col-lg-4 col-md-4">
          <div class="row">
            <div class="single-top-feature">
              <span class="fa fa-hospital-o"></span>
              <h3>Appointment</h3>
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
              <div class="readmore_area">
                <a data-toggle="modal" data-target="#myModal" href="#" data-hover="Appoinment"><span>Appoinment</span></a>    
              </div>
              <!-- start modal window -->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Appoinment Details</h4>
                    </div>
                    <div class="modal-body">
                      <div class="appointment-area">

          <?= form_open('Home/book_appointment_section'); ?>
                      <div class="row">
                          <div class="col-md-6 col-sm-6">
                              <label class="control-label">Your name <span class="required">*</span>
                              </label>
                              <input type="text" name="name" class="wp-form-control wpcf7-text" placeholder="Your name">
                              <span style="color: red"><?= display_error($validation,'name'); ?></span>
                          </div>
                          <div class="col-md-6 col-sm-6">
                              <label class="control-label">Your Email <span class="required">*</span>
                              </label>
                              <input type="mail" name="email" class="wp-form-control wpcf7-email" placeholder="Email address">  
                              <span style="color: red"><?= display_error($validation,'email'); ?></span> 
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6 col-sm-6">
                              <label class="control-label">Symptoms <span class="required">*</span>
                              </label>
                              <input type="text" name="Symptoms" class="wp-form-control wpcf7-text" placeholder="Enter Issue Symptoms">
                              <span style="color: red"><?= display_error($validation,'Symptoms'); ?></span> 
                          </div>
                          <div class="col-md-6 col-sm-6">
                            <label class="control-label">Your Phone <span class="required">*</span>
                            </label>
                            <input type="text" name="mobile" class="wp-form-control wpcf7-text" placeholder="Phone No"> <span style="color: red"><?= display_error($validation,'mobile'); ?></span> 
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6 col-sm-6">
                              <label class="control-label">Appointment Date <span class="required">*</span>
                              </label>
                              <input type="date" name="appointment_date" class="wp-form-control wpcf7-text" placeholder="dd/mm/yy">
                              <span style="color: red"><?= display_error($validation,'appointment_date'); ?></span>
                          </div>
                          <div class="col-md-6 col-sm-6">
                              <label class="control-label">Appointment Time <span class="required">*</span>
                              </label>
                              <input type="time" name="appointment_time" class="wp-form-control wpcf7-text" placeholder="dd/mm/yy">
                              <span style="color: red"><?= display_error($validation,'appointment_time'); ?></span>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12 col-sm-12">
                              <label class="control-label">Select Department <span class="required">*</span>
                              </label>
                              <select class="wp-form-control wpcf7-select"  name="department">
                                <option selected="" disabled="">Select Department</option>
                                <?php if($department):
                                count($department);
                                foreach($department as $dep): ?>
                                  <option value="<?= $dep->department_name ?>"><?= $dep->department_name ?></option>
                                <?php endforeach; ?>
                                <?php else: ?>
                                  <h6 style="color: red">Department Not Found</h6>
                                <?php endif; ?>
                              </select>
                              <span style="color: red"><?= display_error($validation,'department'); ?></span>
                  </div>
                  <input type="hidden" name="doctor_id" value="<?= $doctors[0]->id; ?>">      
                        <input type="hidden" name="doctor_name" value="<?= $doctors[0]->doctor_name; ?>">      
                      </div>   
                        
                          <textarea class="wp-form-control wpcf7-textarea" name="description" cols="30" rows="10" placeholder="What would you like to tell us"></textarea>
                          <button class="wpcf7-submit button--itzel" type="submit"><i class="button__icon fa fa-share"></i><span>Book Appointment</span></button>  
                  <?= form_close(); ?>
                      </div>
                    </div>                    
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
            </div>
          </div>
        </div>
        <!-- End Single Top Feature -->
      </div>
    </section>