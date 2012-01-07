<?php
  include_once ("functions.php");

  $title = "首頁";
  $page = "home";
  include ("header.php");
?>

<div class="container">
  <div id='ip_table'>
    <div class="page-header">
    <h1>140.121.80.0/24 <small>IP 配置狀態</small></h1>
    </div>
    <table>
        <thead>
            <tr>
                <th>IP位址</th>
                <th>有無被設定</th>
                <th>機器功能</th>
                <th>使用的連接埠</th>
                <th>負責人</th>
                <th>機器所在位置</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $link = mysql_connect(MYSQL_LOCATION, MYSQL_USERNAME, MYSQL_PASSWORD) or die("無法與MySQL建立連線");
                mysql_select_db(MYSQL_DATABASE);
                $result = mysql_query("select * from ips");
                
                for ( $counter = 0; $row = mysql_fetch_row( $result ); $counter++)
                {
                    $ipaddr = htmlspecialchars($row[0]);//ip
                    $used = htmlspecialchars($row[1]);//used
                    $func = htmlspecialchars($row[2]);//func
                    $ports = htmlspecialchars($row[3]);//ports
                    $owner = htmlspecialchars($row[4]);//owner
                    $place = htmlspecialchars($row[5]);//place
    		
    		if($used == 0)
    		    continue;

                    print( '<tr>' );
                        print( "<td>$ipaddr</td>" );
                        print( "<td>有人用</td>" );
                        
                        if(is_null($func))
                            print( "<td >無功能資料</td>" );
                        else
                            print( "<td>$func</td>" );            
                            
                        if(is_null($ports))
                            print( "<td>無port資料</td>" );
                        else
                            print( "<td>$ports</td>" );
                            
                        if(is_null($owner))
                            print( "<td>無使用者資料</td>" );
                        else
                            print( "<td>$owner</td>" );

    		    if(is_null($place))
                            print( "<td>無放置位址資料</td>" );
                        else
                            print( "<td>$place</td>" );   
                        
                    print( '</tr>');
                }
                mysql_close($link);
            ?>
        </tbody>
    </table>
  </div>

</div>
<?php include ("footer.php"); ?>
