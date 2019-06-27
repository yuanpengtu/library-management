<?php
    header("Content-type: text/html; charset=utf-8");
    	$cardnumber=$_POST['cardnumber'];
        $username = $_POST['username'];
        $gender=$_POST['gender'];
        $apartment=$_POST['apartment'];
        $grade=$_POST['grade'];
        
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $timenow=date('y-m-d h:m:s',time());
        $timenow='20'."".$timenow;
        echo $timenow;
        if ($cardnumber == ''){
            echo '<script>alert("请输入证件号码！");history.go(-1);</script>';
            exit(0);
        }
        if ($username == ''){
            echo '<script>alert("请输入姓名！");history.go(-1);</script>';
            exit(0);
        }
        
        if ($gender == ''){
        	echo '<script>alert("请输入性别！");history.go(-1);</script>';
        	exit(0);
        }
        
        if ($apartment == ''){
        	echo '<script>alert("请输入系名！");history.go(-1);</script>';
        	exit(0);
        }
        if ($grade == ''){
        	echo '<script>alert("请输入年级！");history.go(-1);</script>';
        	exit(0);
        }
        
        if ($phone == ''){
            echo '<script>alert("请输入电话号码！");history.go(-1);</script>';
            exit(0);
        }
        if ($email == ''){
        	echo '<script>alert("请输入邮箱！");history.go(-1);</script>';
        	exit(0);
        }
       
        if ($password == ''){
            echo '<script>alert("请输入密码");history.go(-1);</script>';
            exit(0);
        }
        if ($password != $repassword){
            echo '<script>alert("密码与确认密码应该一致");history.go(-1);</script>';
            exit(0);
        }
        if($password == $repassword){
            $conn=mysqli_connect("localhost","root","");
			mysqli_select_db($conn,"homework");
			mysqli_query($conn,"set names 'utf8'");
            if ($conn->connect_error){
                echo '数据库连接失败！';
                exit(0);
            }else {
                $sql = "select cardnumber from user where cardnumber = '$cardnumber'";
                $result = $conn->query($sql);
                $number = mysqli_num_rows($result);
                if ($number) {
                    echo '<script>alert("证件号码已经存在");history.go(-1);</script>';
                } else {
                	echo $cardnumber;
                	echo " ";
                	echo $username;
                	echo " ";
                	echo $gender;
                	echo " ";
                	echo $apartment;
                	echo " ";
                	echo $grade;
                	echo " ";
                	echo $phone;
                	echo " ";
                	echo $email;
                	echo " ";
                	echo $timenow;
                	echo " ";
                    $sql_insert = "insert into user (cardnumber,username,gender,apartment,grade,phone,email,country,type,effecttime,password,chargemoney) values('$cardnumber','$username','$gender','$apartment','$grade','$phone','$email','中国','学生','$timenow','$password','0')";
                    //$sql_insert = "insert into user (cardnumber,username,gender,apartment,grade,password) values('$cardnumber','$username','$gender','$apartment','$grade','$password')";
                    $res_insert = $conn->query($sql_insert);
                    if ($res_insert) {
                        echo '<script>window.location="index.html";</script>';
                    } else {
                        echo "<script>alert('注册失败！');history.go(-1);</script>";
                    }
                }
            }
        }else{
            echo "<script>alert('提交未成功！'); history.go(-1);</script>";
        }
?>