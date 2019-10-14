      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              MIESTELIS.LT
              <a href="blank.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('admin/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.ui.touch-punch.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('admin/assets/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.nicescroll.js" type="text/javascript') }}"></script>


    <!--common script for all pages-->
    <script src="{{ asset('admin/assets/js/common-scripts.js') }}"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>