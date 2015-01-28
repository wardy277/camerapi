
function sync_time(){
	var date_time = moment().format('YYYY-MM-DD HH:mm:ss')

	$.post('/ajax/update_time.php', {date_time:date_time});
}


function init(){

}
