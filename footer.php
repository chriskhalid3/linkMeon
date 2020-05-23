<script src="javascript/anime-master/lib/anime.min.js"></script>
  <script src="maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="javascript/activate.js"></script>
  
  <script>
    $(document).ready(function(){
      var commentCount = 2 ;
        $("button").click(function(){
          var newComment = commentCount + 2;
          $('#comment').load('load-coments.php',{
                      newCommentCount: newComment
          });
        });
    });
    $(document).ready(function(){
      $('#searchBox').keyup(function(){
       var searchValue = $('#searchBox').val();
       var searchResultPlace = document.getElementById('search-result');
       if(searchValue.length >= 2 ){    
                $.ajax({
                    url:'include/load_search.php',
                    method:'POST',
                    data:{
                        search: 1,
                        claimedSearch: searchValue 
                    },
                    success: (data)=>{
                      $('#search-result').html(data)
                    },
                    dataType:'text'
                })
               }
               else{
                $('#search-header').html('search result');
               }      
       
      });

      $('#searchbox-mob').keyup(function(){
        var search = document.getElementById('searchbox-mob').value.trim();
        if(search.length >= 2 ){
          $.ajax({
            url:'include/load_search.php',
            method:'POST',
            data:{
              claimedSearch : search
            },
             success:(data)=>{
               $('#search-result-mob').html(data);
            },
            dataType:'text'

          })
        }
      });
      $(document).on('click','#search-found',()=>{
       var search  = '';
       var resultField  =  $('#resultfield');
       $('#searchBox').val(search);
       resultField.css({opacity:0});
       console.log(search);  
      });
      $(document).on('click','#search-found',()=>{
        var serTar = '';
        var resultFieldMob = $('#reasult-mob');
        $('#searchbox-mob').val(serTar);
        resultFieldMob.css({opacity:0});  
        resultFieldMob.css({position:'absolute'});  
                

      });
    });
   
    </script>

</body>
</html>