Login.php
<?
// db connection string
$conn=mysql_pconnect($dbhost,$dbuser,$dbpass);
    if(!@$conn) {
        echo "<h1>Unable to Establish Connection to the Server</h1><hr noshade size=2 color=#000000>";
        exit();
    }
    $db_sel=mysql_select_db($dbname,$conn);
    if(!@$db_sel) {
        echo "<h1>Unable to Connect to the Database</h1><hr noshade size=2 color=#000000>";
        exit();
    }

// Submit button click 

$uname = $_POST['uname'];
$pass = $_POST['pass'];
if(isset($_REQUEST['submit']))
 {
   $sign=mysql_query("select * from ".ADMINLOGIN." where  username='$uname' and password='$pass'");
   $no=mysql_num_rows($sign); 
//if username and password matches
   if($no==1)
    { 
       $_SESSION['logkey']=signedup;
        $_SESSION['adminname']=$uname;
        
        $logintimes=mktime();
        
        $ipaddress=$_SERVER['REMOTE_ADDR'];
        
        // redirect to the password protected page
           
         echo "<meta http-equiv='refresh' content='0;url=hhs.html'>";        
         exit();
         
     } 
     
     Else{ // if username password entered is wrong
        echo "<meta http-equiv='refresh' content='0;url=no.html'>";        
        exit();
 }

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="100" height="43" align="left" valign="top" style="padding-left:20px"><span class="style3">&nbsp;User Name :</span></td>

                  <td width="118" align="left" valign="top"><input type="text" name="uname" value="<?=$uname;?>" class="style3" size="18"/></td>
                </tr>
                <tr>
                  <td align="left" valign="top" class="style3" style="padding-left:20px">&nbsp;Password :</td>
                  <td align="left" valign="top"><input type="password" name="pass"  class="style3" size="18"/></td>
                </tr>
                <tr>

                  <td height="37" colspan="2" align="center" valign="top"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="100">&nbsp;</td>
                        <td width="118" height="37" align="center" valign="middle">
                        <input type="submit" name="submit" value="Login" class="button"  />                          </td>
                      </tr>
                    </table></td>
                </tr>
              </table>