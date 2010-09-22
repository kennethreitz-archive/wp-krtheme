<style type="text/css">
    .wrap h2 {
        font-style:normal !important;
    }
    
    #isIa3Back {
        margin-top:20px;
        padding:0;
    }
    
    #isIa3Back h2, 
    #isIa3Back h3, 
    #isIa3Back label, 
    #isIa3Back ol, 
    #isIa3Back p,
    #isIa3Back ul {
        font:normal normal 400 16px/24px Georgia, Serif;
        list-style:none;
        margin:0;
        padding:0;
    }
    
    #isIa3Back table {
        border:none;
        border-collapse:collapse;
        margin:0;
        padding:0;
        width:100%;
    }
    
    #isIa3Back table td,
    #isIa3Back table th {
        border-bottom:dotted 1px #CCC;
        padding-bottom:23px;
        padding-top:24px;
        text-align:left;
        vertical-align:top;
    }

    #isIa3Back table .lastChild td,
    #isIa3Back table .lastChild th {
        border-bottom-color:#F9F9F9;
    }
    
    #isIa3Back table p {
        color:#999;
        font-size:14px;
        line-height:21px;
        max-width:50%;
        margin:12px 0 0;
    }
    
    #isIa3Back form table .isColLabel {
        text-align:right;
        padding-right:24px;
        width:216px;
    }
    
    #isIa3Back .isIa3Nav {
        border:solid 1px #CCC;
        margin:36px 0 24px;
        padding:18px 24px 24px;
        position:relative;
    }

    #isIa3Back .isIa3Nav h3 {
        background:#F6F6F6;
        font-size:16px;
        font-style:italic;
        left:18px;
        padding:0 6px;
        position:absolute;
        top:-36px;
    }
    
    #isIa3Back .isIa3NavTable {
        margin:0;
    }
    
    #isIa3Back .isIa3NavTable td,
    #isIa3Back .isIa3NavTable th {
        padding-bottom:11px;
        padding-top:12px;
        text-align:center;
        width:25%;
    }
    
    #isIa3Back .isIa3NavTable .lastChild td,
    #isIa3Back .isIa3NavTable .lastChild th {
        padding-bottom:0;
    }
    
    #isIa3Back form .isIa3NavTable input,
    #isIa3Back form .isIa3NavTable select {
        width:100%;
    }
    
    #isIa3Back .isIa3NavTable th input {
        font-weight:700;
    }
    
    #isIa3Back form {
        border:none;
        margin:0;
        padding:0;
    }
    
    #isIa3Back button,
    #isIa3Back select,
    #isIa3Back input {
        margin:0;
        width:auto;
    }
    
    #isIa3Back button,
    #isIa3Back input {
        font:normal normal 400 12px/18px Arial, Sans-serif;
    }
    
    #isIa3Back button {
        background:#227399;
        background:-moz-linear-gradient(top,#298CBA,#227399);
        background:-webkit-gradient(linear,left top,left bottom,from(#298CBA),to(#227399));
        border:none;
        border-radius:2px;
        color:#FFF;
        font-size:12px;
        font-weight:bold;
        line-height:30px;
        padding:0 12px;
    }
    
    #isIa3Back input.isInputText {
        border:solid 1px #CCC;
        border-radius:2px;
        padding:2px 6px;
    }
    
    #isIa3Back input.isInputTextLong {
        width:450px;
    }
    
    #isIa3Back input.isInputMono {
        font-family:monospace !important;
    }
    
    #isIa3Content {
        clear:left;
    }
    
    #isIa3Content h3 {
        font-size:18px;
        margin:24px 0 0;
    }
    
    #isIa3Tabs {
        border-bottom:solid 1px #CCC;
        font-size:14px !important;
        height:36px;
    }
    
    #isIa3Tabs li {
        float:left;
    }
    
    #isIa3Tabs a {
        background:#F9F9F9;
        border:solid 1px #CCC;
        border-top-left-radius:4px;
        border-top-right-radius:4px;
        color:#333;
        display:block;
        font-style:italic;
        font-weight:400;
        line-height:35px !important;
        margin:0 2px 0 4px;
        padding:0 12px;
        text-decoration:none;
    }
    
    #isIa3Tabs a:hover {
        text-decoration:underline;
    }
    
    #isIa3Tabs strong a {
        border-bottom-color:#F9F9F9;
    }
</style>
<div class="wrap">
    <div id="icon-themes" class="icon32"><br></div>
    <h2>iA³</h2>    
    
    <div id="isIa3Back">
        <?php preg_match("/([1-2]{1})/", $_GET['tab'])? @include('admin_tab_' . (int) $_GET['tab'] . '.php'): @include('admin_tab_1.php'); ?>
    </div><!-- #isIa3Back -->
</div>