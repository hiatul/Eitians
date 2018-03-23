<?php
date_default_timezone_set('Asia/Kolkata');
include '../Connection/connect.php';
include '../DocConverter/Doc_Converter.php';


if($connection==1)
{
    $date = date('Y-m-d H:i:s');
//    $c="select * from resume where Aid=21";
//    
//    $rs=$con->query($c);
//                    if($data=$rs->fetch_assoc())
//                            {
//                        $path=$data['Path'];
////                    echo file_get_contents($path);
////                    file_put_contents("../ApplicantResume/33.docx", file_get_contents($path));
//                        $docObj = new DocxConversion($path);
//                        //$docObj = new DocxConversion("test.docx");
//                        //$docObj = new DocxConversion("test.xlsx");
//                        //$docObj = new DocxConversion("test.pptx");
//                        $docText= $docObj->convertToText();
//                        echo $docText;
//                           $i="insert into SearchResume (ResumeText,UpdateDate) values('$Text','$date')"; 
//                                    if($result=$con->query($i))
//                                    { 
                                        
                                        $c="select * from SearchResume where Id=33";
                                        $rs=$con->query($c);
                                                        if($data=$rs->fetch_assoc())
                                                                {
                                                            echo $data['ResumeText'];
                                                                }
                                                        
                                        
//                                    }
//                                }

                                
                                
    }

?>

