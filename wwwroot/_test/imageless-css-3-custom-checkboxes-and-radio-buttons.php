<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>Imageless CSS3 Custom Checkboxes and Radio Buttons</title>
        <meta charset="utf-8" />
        <style>
        .imageless-css-3-form-elements label
        {
            cursor: hand;
            cursor: pointer;
        }
        
        .imageless-css-3-form-elements label input[type="checkbox"],
        .imageless-css-3-form-elements label input[type="radio"],
        .imageless-css-3-form-elements label input[type="checkbox"] + span,
        .imageless-css-3-form-elements label input[type="radio"] + span,
        .imageless-css-3-form-elements label input[type="checkbox"] + span::before,
        .imageless-css-3-form-elements label input[type="radio"] + span::before
        {
            vertical-align: middle;
        }
        
        .imageless-css-3-form-elements label input[type="checkbox"],
        .imageless-css-3-form-elements label input[type="radio"]
        {
            position: absolute;
            filter: alpha(opacity=0);
            -moz-opacity: 0;
            -webkit-opacity: 0;
            opacity: 0;
        }
        
        .imageless-css-3-form-elements label input[type="checkbox"] + span,
        .imageless-css-3-form-elements label input[type="radio"] + span,
        .imageless-css-3-form-elements label input[type="checkbox"] + span::before,
        .imageless-css-3-form-elements label input[type="radio"] + span::before
        {
            display: inline-block;
        }
        
        .imageless-css-3-form-elements label input[type="checkbox"] + span,
        .imageless-css-3-form-elements label input[type="radio"] + span
        {
            font: normal 13px/14px "Segoe UI", Sans-serif;
        }
        
        .imageless-css-3-form-elements label input[type="checkbox"] + span::before
        {
            content: "\2714";
        }
        
        .imageless-css-3-form-elements label input[type="checkbox"] + span::before,
        .imageless-css-3-form-elements label input[type="radio"] + span::before
        {
            text-indent: -9999px;
            width: 12px;
            height: 12px;
            font: bold 12px/12px Garamond, "Segoe UI", Sans-serif;
            text-transform: uppercase;
            border: solid 1px #0b70cd;
            border-radius: 3px;
            box-shadow: 0 0 1px 1px #ccc;
            background: #0b70cd;
            background: -moz-linear-gradient(-45deg, #fefefe, #0b70cd);
            background: -webkit-linear-gradient(-45deg, #fefefe, #0b70cd);
            background: -o-linear-gradient(-45deg, #fefefe, #0b70cd);
            background: -ms-linear-gradient(-45deg, #fefefe, #0b70cd);
            background: linear-gradient(-45deg, #fefefe, #0b70cd);
            margin: 0 4px 0 0;
        }
        
        .imageless-css-3-form-elements label:hover input[type="checkbox"]:not(:disabled) + span::before,
        .imageless-css-3-form-elements label:hover input[type="radio"]:not(:disabled) + span::before
        {
            background: #0b70cd;
            background: -moz-linear-gradient(45deg, #fefefe, #0b70cd);
            background: -webkit-linear-gradient(45deg, #fefefe, #0b70cd);
            background: -o-linear-gradient(45deg, #fefefe, #0b70cd);
            background: -ms-linear-gradient(45deg, #fefefe, #0b70cd);
            background: linear-gradient(45deg, #fefefe, #0b70cd);
            box-shadow: 0 0 1px 2px #ccc;
        }
        
        .imageless-css-3-form-elements label input[type="checkbox"]:checked + span::before,
        .imageless-css-3-form-elements label input[type="radio"]:checked + span::before
        {
            text-indent: 2px;
            color: #fff;
            text-shadow: 0 0 2px #0b70cd;
        }
        
        .imageless-css-3-form-elements label input[type="radio"] + span::before
        {
            content: "\2022";
            font-size: 22px;
            -moz-border-radius: 12px;
            -webkit-border-radius: 12px;
            border-radius: 12px;
        }
        
        .imageless-css-3-form-elements label input[type="radio"]:checked + span::before
        {
            text-indent: 2px;
        }
        
        .imageless-css-3-form-elements label input[type="checkbox"]:disabled + span::before,
        .imageless-css-3-form-elements label input[type="radio"]:disabled + span::before
        {
            filter: alpha(opacity=50);
            -moz-opacity: .5;
            -webkit-opacity: .5;
            opacity: .5;
        }
        
        .imageless-css-3-form-elements label input[type="checkbox"]:disabled + span,
        .imageless-css-3-form-elements label input[type="radio"]:disabled + span,
        .imageless-css-3-form-elements label input[type="checkbox"]:disabled + span::before,
        .imageless-css-3-form-elements label input[type="radio"]:disabled + span::before
        {
            cursor: default;
        }
        </style>
	</head>
	<body>
        <h3>Enabled Group</h3>
        <ul class="imageless-css-3-form-elements">
            <li><label><input type="radio" checked="checked" name="radio-button-group-0"><span>radio</span></label></li>
            <li><label><input type="radio" name="radio-button-group-0"><span>radio</span></label></li>
            <li><label><input type="radio" name="radio-button-group-0"><span>radio</span></label></li>
        </ul>
        
	</body>
</html>