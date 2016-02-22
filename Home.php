<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SLEDS Donate</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <meta name="viewport" content="width=device-width, user-scalable=no">
    </head>

    <body class="body">
        <?php
        require_once 'core/init.php';





        if (Input::exists()) {
           
            if (Token::check(Input::get('token'))) {
                
                $validate = new Validate();
                $validation = $validate->check($_POST, array(
                    'name' => array(
                        'required' => true,
                        'min' => 2,
                        'max' => 20,
                        'unique' => 'users'),
                    
                    'address' => array(
                        'required' => true,
                        'min' => 2,
                    ),
                    
                    'dob' => array(
                        'required' => true,
                    ),
                    
                    'nic' => array(
                        'required' => true,
                        'min' => 10,
                        'max' => 10,
                    ),
                    'password' => array(
                        'required' => true,
                        'min' => 6),
                    'reenterpassword' => array(
                        'required' => true,
                        'matches' => 'password'
                    ),
                    'username' => array(
                        'required' => true,
                        'min' => 2,
                        'max' => 50
                    )
                ));
                if ($validation->passed()) {
                   $user = new User();
                   $salt = Hash::salt(32);
                  
                   try{
                       $user->create(array(
                           'd_id' => Input::get('nic'),
                           'd_sname' => Input::get('name'),
                            'd_address_l1' => Input::get('address'),
                            'd_address_l2' => Input::get('addressline2'),
                            'd_address_l3' => Input::get('addressline3'),
                            'd_gender' => Input::get('sex'),
                            'dob' => Input::get('dob'),
                            'd_tel' => Input::get('tNo'),
                            'd_e-mail' => Input::get('email'),
                            'd_nationality' => Input::get('nationality'),
                            'd_religion' => Input::get('religion'),
                            'd_district' => Input::get('district'),
                            'd_electorate' => Input::get('electorate'),
                            'w1_name' => Input::get('wname1'),
                            'w1_address_l1' => Input::get('wadd1'),
                            'w1_address_l2' => Input::get('waddressline2'),
                            'w1_address_l3' => Input::get('waddressline3'),
                            'w1_relationship' => Input::get('wrelation1'),
                            'w1_nic' => Input::get('wnic1'),
                            'w1_tel' => Input::get('wtno1'),
                            'w1_e-mail' => Input::get('wemail1'),
                            'w2_name' => Input::get('wname2'),
                            'w2_address_l1' => Input::get('wadd2'),
                            'w2_address_l2' => Input::get('wwaddressline2'),
                           'w2_address_l3' => Input::get('wwaddressline3'),
                           'w2_relationship' => Input::get('wrelation2'),
                           'w2_nic' => Input::get('wnic2'),
                            'w2_tel' => Input::get('wtno2'),
                            'w2_e-mail' => Input::get('wemail2'),
                            'user_name' => Input::get('username'),
                            'password' => $salt,
                            're_password' => Input::get('reenterpassword')
                           
                       ));
                       
                }catch(Exception $e){
                    die($e->getMessage());
                }
                } else {
                    $validation->errors();
                   echo '<script type="text/javascript">alert(" ' . $validation->errors() . '");</script>';
                   
                    
                    
                }
            }
        }
        ?>
        <div id="wrapper">
            <header class="mainHeader">

                <img src="Images/Logo.png" align="left" />
                <p id="titlename"> Sri Lanka<br> Eye Donation Society</p>

                <nav><ul>
                        <li><a href="#">Home</a></li>
                        <li class="active"><a href="#"/>Donate</a></li>
                        <li><a href="#">Reservation</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul></nav>

            </header>
        </div>
        <div id="wrapper">

            <form class="form" method="post">
                <div id="wrapper">
                    <h2>DONOR REGISTRATION FORM</h2>
                </div>
                <table>
                    <tr>
                        <td id="lab">
                            <label for="name">Name of Donor :</label>
                        </td>
                        <td id="textbox">
                            <input type="text" name="name" id="name" />
                        </td>
                    </tr>

                    <tr>
                        <td id="lab">
                            <label for="address">Address :</label>
                        </td>
                        <td id="textbox">
                            <input type="text" name="address" id="address" style="width: 200px" />
                        </td>

                    </tr>
                    <tr>
                        <td id="lab">

                        </td>
                        <td id="textbox">
                            <input type="text" name="addressline2" id="addressline2" style="width: 200px"/>
                        </td>

                    </tr>
                    <tr>
                        <td id="lab">

                        </td>
                        <td id="textbox">
                            <input type="text" name="addressline3" id="addressline3" style="width: 200px"/>
                        </td>

                    </tr>
                    <tr>
                        <td id="lab">
                            <label for="sex">Sex :</label>
                        </td>
                        <td id="drop">
                            <select name="sex" id="sex" style="width: 75px">

                                <option value="Male">Male</option>
                                <option  value="Female">Female</option>

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td id="lab">
                            <label for="dob">Date of Birth :</label>
                        </td>
                        <td id="textbox">
                            <input type="date" name="dob" id="dob" style="width: 150px" />
                        </td>
                    </tr>
                    <tr>
                        <td id="lab">
                            <label for="nic">NIC Number :</label>
                        </td>
                        <td id="textbox">
                            <input type="text" name="nic" id="nic" style="width: 100px"/>
                        </td>
                    </tr>
                    <tr>
                        <td id="lab">
                            <label for="tNo">Telephone Number :</label>
                        </td>
                        <td id="textbox">
                            <input type="text" name="tNo" id="tNo" style="width: 100px"/>
                        </td>
                    </tr>

                    <tr>
                        <td id="lab">
                            <label for="email">E-Mail :</label>
                        </td>
                        <td id="textbox">
                            <input type="text" name="email" id="email" style="width: 200px"/>
                        </td>
                    </tr>
                    <tr>
                        <td id="lab">
                            <label for="nationality">Nationality :</label>
                        </td>
                        <td id="textbox">
                            <input type="text" name="nationality" id="nationality" style="width: 100px"/>
                        </td>
                    </tr>
                    <tr>
                        <td id="lab">
                            <label for="religion">Religion :</label>
                        </td>
                        <td id="textbox">
                            <input type="text" name="religion" id="religion" style="width: 100px"/>
                        </td>
                    </tr>
                    <tr>
                        <td id="lab">
                            <label for="district">District :</label>
                        </td>
                        <td id="textbox">
                            <input type="text" name="district" id="district" style="width: 100px" />
                        </td>
                    </tr>

                    <tr>
                        <td id="lab">
                            <label for="electorate">Electorate :</label>
                        </td>
                        <td id="textbox">
                            <input type="text" name="electorate" id="electorate" style="width: 100px"/>
                        </td>
                    </tr>
                </table><br>

                <h3>Details of Witnesses</h3>



                <h5>First Witness</h5><br><br>


                <table>
                    <tr>
                        <td id="lab">

                            <label for="wname1">Name : </label>
                        </td>
                        <td id="textbox">
                            <input type="text" name="wname1" id="wname1" />
                        </td>
                    </tr>
                    <tr>
                        <td id="lab">
                            <label for="wadd1">Address : </label>
                        </td>

                        <td id="textbox"> 
                            <input type="text" name="wadd1" id="wadd1" style="width: 200px"/>
                        </td>
                    </tr>
                    <tr>
                        <td id="lab">

                        </td>
                        <td id="textbox">
                            <input type="text" name="waddressline2" id="waddressline2" style="width: 200px"/>
                        </td>

                    </tr>
                    <tr>
                        <td id="lab">

                        </td>
                        <td id="textbox">
                            <input type="text" name="waddressline3" id="waddressline3" style="width: 200px"/>
                        </td>

                    </tr>
                    <tr>
                        <td id="lab">
                            <label for="wrelation1">Relationship : </label>
                        </td>
                        <td id="textbox">
                            <input type="text" name="wrelation1" id="wrelation1" style="width: 100px" />
                        </td>
                    </tr>
                    <tr>
                        <td id="lab">
                            <label for="wnic1">NIC Number : </label>
                        </td>
                        <td id="textbox">
                            <input type="text" name="wnic1" id="wnic1" style="width: 100px"/>
                        </td>
                    </tr>
                    <tr>
                        <td id="lab">
                            <label for="wtno1">Telephone Number : </label>
                        </td>
                        <td id="textbox">
                            <input type="text" name="wtno1" id="wtno1" style="width: 100px"/>
                        </td>
                    </tr>
                    <tr>
                        <td id="lab">
                            <label for="wemail1">E-Mail : </label>
                        </td>
                        <td id="textbox">
                            <input type="text" name="wemail1" id="wemail1" style="width: 200px" />
                        </td>
                    </tr>
                </table>



                <h5>Second Witness</h5><br>
                <br>



                <table>
                    <tr>
                        <td id="lab">
                            <label for="wname2">Name : </label>
                        </td>
                        <td id="textbox">
                            <input type="text" name="wname2" id="wname2" />
                        </td>
                    </tr>
                    <tr>
                        <td id="lab">
                            <label for="wadd2">Address : </label>
                        </td>
                        <td id="textbox">
                            <input type="text" name="wadd2" id="wadd2" style="width: 200px" />
                        </td>
                    </tr>
                    <tr>
                        <td id="lab">

                        </td>
                        <td id="textbox">
                            <input type="text" name="wwaddressline2" id="wwaddressline2" style="width: 200px"/>
                        </td>

                    </tr>
                    <tr>
                        <td id="lab">

                        </td>
                        <td id="textbox">
                            <input type="text" name="wwaddressline3" id="wwaddressline3" style="width: 200px"/>
                        </td>

                    </tr>
                    <tr>
                        <td id="lab">
                            <label for="wrelation2">Relationship : </label>
                        </td>
                        <td id="textbox">
                            <input type="text" name="wrelation2" id="wrelation2" style="width: 100px"/>
                        </td>
                    </tr>
                    <tr>
                        <td id="lab">
                            <label for="wnic2">NIC Number : </label>
                        </td>
                        <td id="textbox">
                            <input type="text" name="wnic2" id="wnic2" style="width: 100px"/>
                        </td>
                    </tr>
                    <tr>
                        <td id="lab">
                            <label for="wtno2">Telephone Number : </label>
                        </td>
                        <td id="textbox">
                            <input type="text" name="wtno2" id="wtno2" style="width: 100px"/>
                        </td>
                    </tr>

                    <tr>

                        <td id="lab">
                            <label for="wemail2">E-Mail : </label>
                        </td>
                        <td id="textbox">
                            <input type="text" name="wemail2" id="wemail2" style="width: 200px"/>
                        </td>
                    </tr>

                </table>
                <table>
                    <br>
                    <hr>
                    <br>
                    <tr>

                        <td id="lab">
                            <label for="username">Username : </label>
                        </td>


                        <td id="textbox">
                            <input type="text" name="username" id="username" style="width: 200px"/>
                        </td>
                    </tr>
                    <tr>
                        <td id="lab">
                            <label for="password">Password : </label>
                        </td>
                        <td id="textbox">
                            <input type="password" name="password" id="password" style="width: 200px"/>
                        </td>
                    </tr>
                    <tr>
                        <td id="lab">
                            <label for="reenterpassword">Re Enter Password : </label>
                        </td>
                        <td id="textbox">
                            <input type="password" name="reenterpassword" id="reenterpassword" style="width: 200px"/>
                        </td>
                    </tr>

                </table>
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                <input id="submit" type="submit" value="Submit"/>


            </form>
        </div>


    </body>
</html>
