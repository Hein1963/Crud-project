<?php 
                                                         $morning = "AM";
                                                         $evening = "PM";
                                                        $currentDate = date('m-d-Y H:i');
                                                        echo "$currentDate\t" .$morning;
                                                    ?>

<?php
                                                        <?php
                                                        $currentDateTime = new DateTime('now');
                                                        $currentDate = $currentDateTime->format('Y-m-d');
                                                        echo $currentDate;
                                                    ?>