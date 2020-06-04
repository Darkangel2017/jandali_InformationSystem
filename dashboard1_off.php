<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<style type="text/css">
	.grid-container{
		display: grid;
		grid-template-columns: auto auto auto;
  		grid-gap: 10px;
  		background-color: #2196F3;
  		padding: 10px;
		}

	.grid-container > div {
		background-color: rgba(255, 255, 255, 0.8);
  		border: 1px solid rgba(0, 0, 0, 0.8);
  		padding: 20px;
  		font-size: 30px;
 		text-align: center;}
 	.menu {
 		grid-column-start: 1;
 		grid-column-end: 4;
 	}
	</style>
</head>
<body>
<div class="grid-container">
	<div class="menu">Menu</div>
	<div class="item2">Item2</div>
	<div class="item3">Item3</div>
	<div class="item4">Item4</div>
	<div class="item5">Item5</div>
	<div class="item6">Item6</div>
	<div class="item7">Item7</div>
	<div class="item8">Item8</div>
	<div class="item9">Item9</div>
</div>
</body>
</html>