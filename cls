[1mdiff --git a/public/backend/css/accordions.css b/public/backend/css/accordions.css[m
[1mnew file mode 100644[m
[1mindex 0000000..5341ce7[m
[1m--- /dev/null[m
[1m+++ b/public/backend/css/accordions.css[m
[36m@@ -0,0 +1,62 @@[m
[32m+[m[32m/*----------------------------------------*/[m
[32m+[m[32m/*  1.  accordion CSS[m
[32m+[m[32m/*----------------------------------------*/[m
[32m+[m
[32m+[m[32m.edu-custon-design .panel{[m
[32m+[m	[32mbackground:none;[m
[32m+[m	[32mbox-shadow:none;[m
[32m+[m[32m}[m
[32m+[m[32m.edu-custon-design .panel-default{[m
[32m+[m	[32mborder:none;[m
[32m+[m[32m}[m
[32m+[m[32m.edu-custon-design .panel-collapse .panel-body{[m
[32m+[m	[32mborder-top:none ;[m
[32m+[m[32m}[m
[32m+[m[32m.edu-custon-design .panel-heading{[m
[32m+[m	[32mborder-top-left-radius:0px;[m
[32m+[m	[32mborder-top-right-radius:0px;[m
[32m+[m	[32mbackground:#006DF0;[m
[32m+[m	[32mcolor:#fff;[m
[32m+[m	[32mfont-size:20px;[m
[32m+[m	[32mpadding: 15px 20px;[m
[32m+[m[32m}[m
[32m+[m[32m.edu-custon-design .admin-panel-content{[m
[32m+[m	[32mbackground:#f5f5f5;[m
[32m+[m[32m}[m
[32m+[m[32m.edu-custon-design .admin-panel-content p{[m
[32m+[m	[32mfont-size:14px;[m
[32m+[m	[32mcolor:#444;[m
[32m+[m	[32mline-height:24px;[m
[32m+[m[32m}[m
[32m+[m[32m.panel-group.edu-custon-design .accordion-head a:hover, .panel-group.edu-custon-design .accordion-head a:focus, .panel-group.edu-custon-design .accordion-head a:active{[m
[32m+[m	[32mcolor:#03a9f4;[m
[32m+[m[32m}[m
[32m+[m[32m.panel-group.edu-custon-design{[m
[32m+[m	[32mmargin-bottom:30px;[m
[32m+[m[32m}[m
[32m+[m[32m.panel-group.edu-custon-design.edu-ad-mg-bt{[m
[32m+[m	[32mmargin-bottom:40px;[m
[32m+[m[32m}[m
[32m+[m[32m.admin-pro-accordion-wrap, .tab-content-details{[m
[32m+[m[32m    background: #fff;[m
[32m+[m[32m    padding: 15px;[m
[32m+[m[32m}[m
[32m+[m[32m.tab-content-details {[m
[32m+[m[32m    text-align: center;[m
[32m+[m[32m    background: #fff;[m
[32m+[m[32m    padding: 20px 100px;[m
[32m+[m[32m}[m
[32m+[m[32m.tab-content-details p {[m
[32m+[m[32m    font-size: 14px;[m
[32m+[m[32m    color: #303030;[m
[32m+[m[32m    line-height: 24px;[m
[32m+[m[32m}[m
[32m+[m[32m.admin-pro-accordion-wrap .panel-group.edu-custon-design {[m
[32m+[m	[32mmargin-bottom:0px;[m
[32m+[m[32m}[m
[32m+[m[32m.panel-group .panel-heading+.panel-collapse>.list-group, .panel-group .panel-heading+.panel-collapse>.panel-body {[m
[32m+[m[32m    border-top: 0px solid #ddd;[m
[32m+[m[32m}[m
[32m+[m[32m.admin-accordion-mg-bt-40{[m
[32m+[m	[32mmargin-bottom:40px;[m
[32m+[m[32m}[m
\ No newline at end of file[m
[1mdiff --git a/public/backend/css/alerts.css b/public/backend/css/alerts.css[m
[1mnew file mode 100644[m
[1mindex 0000000..b7bed83[m
[1m--- /dev/null[m
[1m+++ b/public/backend/css/alerts.css[m
[36m@@ -0,0 +1,224 @@[m
[32m+[m[32m/*----------------------------------------*/[m
[32m+[m[32m/*  1.  Alert CSS[m
[32m+[m[32m/*----------------------------------------*/[m
[32m+[m[32m.alert-title h2{[m
[32m+[m	[32mfont-size:20px;[m
[32m+[m[32m}[m
[32m+[m[32m.alert-title p{[m
[32m+[m	[32mfont-size:14px;[m
[32m+[m[32m}[m
[32m+[m[32m.alert-wrap1, .alert-wrap2, .alert-icon {[m
[32m+[m	[32mbackground:#fff;[m
[32m+[m	[32mpadding:20px;[m
[32m+[m[32m}[m
[32m+[m[32m.alert-wrap1 .alert, .alert-wrap2 .alert, .alert-icon .alert{[m
[32m+[m	[32mmargin-bottom:10px;[m
[32m+[m	[32mborder-radius:0px;[m
[32m+[m[32m}[m
[32m+[m[32m.alert-wrap1 .alert-mg-b, .alert-wrap2 .alert-mg-b, .alert-icon .alert-mg-b{[m
[32m+[m	[32mmargin-bottom:0px;[m
[32m+[m[32m}[m
[32m+[m[32m.alert-icon .alert.alert-mg-b{[m
[32m+[m	[32mmargin-bottom:0px;[m
[32m+[m[32m}[m
[32m+[m[32m.wrap-alert-b{[m
[32m+[m	[32mmargin-bottom:30px;[m
[32m+[m[32m}[m
[32m+[m[32m.alert-success-style1, .alert-success-style2, .alert-success-style3, .alert-success-style4, .alert-st-one, .alert-st-two, .alert-st-three, .alert-st-four{[m
[32m+[m	[32mborder:none;[m
[32m+[m	[32mposition:relative;[m
[32m+[m[32m}[m
[32m+[m[32m.alert-success-style1, .alert-st-one{[m
[32m+[m	[32mbackground:#34a854;[m
[32m+[m[32m}[m
[32m+[m[32m.alert-success-style2, .alert-st-two{[m
[32m+[m	[32mbackground:#4285f3;[m
[32m+[m[32m}[m
[32m+[m[32m.alert-success-style3, .alert-st-three{[m
[32m+[m	[32mbackground:#fbbc01;[m
[32m+[m[32m}[m
[32m+[m[32m.alert-success-style4, .alert-st-four{[m
[32m+[m	[32mbackground:#ea4331;[m
[32m+[m[32m}[m
[32m+[m[32m.alert-success-style1:before, .alert-success-style2:before, .alert-success-style3:before, .alert-success-style4:before{[m
[32m+[m	[32mbackground: #303030;[m
[32m+[m[32m    position: absolute;[m
[32m+[m[32m    content: "";[m
[32m+[m[32m    top: 0px;[m
[32m+[m[32m    right: 0px;[m
[32m+[m[32m    width: 9%;[m
[32m+[m[32m    height: 100%;[m
[32m+[m[32m}[m
[32m+[m[32m.alert-success-style1:after, .alert-success-style2:after, .alert-success-style3:after, .alert-success-style4:after{[m
[32m+[m	[32mposition: absolute;[m
[32m+[m[32m    content: "";[m
[32m+[m[32m    top: 14px;[m
[32m+[m[32m    right: 39px;[m
[32m+[m[32m    border-left-color: #34a853;[m
[32m+[m[32m    border-top: 11px solid transparent;[m
[32m+[m[32m    border-bottom: 11px solid transparent;[m
[32m+[m[32m}[m
[32m+[m[32m.alert-success-style1:after{[m
[32m+[m[32m    border-left: 11px solid #34a853;[m
[32m+[m[32m}[m
[32m+[m[32m.alert-success-style2:after{[m
[32m+[m[32m    border-left: 11px solid #4285f3;[m
[32m+[m[32m}[m
[32m+[m[32m.alert-success-style3:after{[m
[32m+[m[32m    border-left: 11px solid #fbbc01;[m
[32m+[m[32m}[m
[32m+[m[32m.alert-success-style4:after{[m
[32m+[m[32m    border-left: 11px solid #ea4331;[m
[32m+[m[32m}[m
[32m+[m[32m.admin-check-sucess, .admin-check-pro{[m
[32m+[m	[32mcolor: #fff;[m
[32m+[m[32m    position: absolute;[m
[32m+[m[32m    z-index: 9;[m
[32m+[m[32m    width: 50px;[m
[32m+[m[32m    height: 100%;[m
[32m+[m[32m    top: 0px;[m
[32m+[m[32m    left: 0px;[m
[32m+[m[32m    font-size: 16px;[m
[32m+[m[32m    line-height: 50px;[m
[32m+[m[32m    text-align: center;[m
[32m+[m[32m    background: #303030;[m
[32m+[m[32m}[m
[32m+[m[32m.admin-check-sucess:after, .admin-check-pro:after{[m
[32m+[m	[32mposition: absolute;[m
[32m+[m[32m    content: "";[m
[32m+[m[32m    top: 14px;[m
[32m+[m[32m    left: 47px;[m
[32m+[m[32m    border-left-color: #303030;[m
[32m+[m[32m    border-top: 11px solid transparent;[m
[32m+[m[32m    border-bottom: 11px solid transparent;[m
[32m+[m[32m    border-left: 11px solid #303030;[m
[32m+[m[32m}[m
[32m+[m[32m.alert-success-style1 p, .alert-success-style2 p, .alert-success-style3 p, .alert-success-style4 p{[m
[32m+[m	[32mcolor:#fff;[m
[32m+[m	[32mmargin:0px 60px;[m
[32m+[m	[32mfont-size:14px;[m
[32m+[m[32m}[m
[32m+[m[32m.alert-st-one .message-mg-rt, .alert-st-two .message-mg-rt, .alert-st-three .message-mg-rt, .alert-st-four .message-mg-rt{[m
[32m+[m	[32mcolor:#fff;[m
[32m+[m	[32mmargin:0px 0px 0px 60px;[m
[32m+[m	[32mfont-size:14px;[m
[32m+[m[32m}[m
[32m+[m[32m.alert-success-style1 .icon-sc-cl, .alert-success-style2 .icon-sc-cl, .alert-success-style3 .icon-sc-cl, .alert-success-style4 .icon-sc-cl{[m
[32m+[m	[32mcolor:#fff;[m
[32m+[m	[32mz-index:9;[m
[32m+[m	[32mposition:relative;[m
[32m+[m[41m	[m
[32m+[m[32m}[m
[32m+[m[32m.alert-success-style1 .sucess-op, .alert-success-style2 .sucess-op, .alert-success-style3 .sucess-op, .alert-success-style4 .sucess-op{[m
[32m+[m	[32mopacity:1;[m
[32m+[m[32m}[m
[32m+[m[32m.admin-check-pro.admin-check-pro-none, .admin-check-sucess.admin-check-pro-none{[m
[32m+[m	[32mbackground:none;[m
[32m+[m[32m}[m
[32m+[m[32m.admin-check-pro.admin-check-pro-none:a