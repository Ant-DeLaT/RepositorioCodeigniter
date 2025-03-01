<!DOCTYPE html>
<html>
<head>
    <title>The Calendar has arrived</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

<div>
    <!-- INSERT  -->
    <div class="container">
        <h2 class="mb-4"><span class="text-danger">FullCalendar</span> en Codeigniter 4.0.4</h2>
        <div id='ci_calendar'></div>
    </div>
</div>

<script>
    $().ready(()=> {
        const BASE_URL="<?=base_url()?>";
        // POSSIBLE USE OF "const"
        let calendar= $('#ci_calendar').fullCalendar({
            header:{
                left:'prev,next,today',
                center:'title',
                right:'month,agendaWeek,agendaDay'
            },
            height:580,
            editable:true,
            events:BASE_URL+"/home/index?start=&end=",
            displayEventTime:false,
            selectable:true,
            selectHelper:true,
            select: function(start,end,allDay){
                let title=prompt("Event Title");
                if (title) {
                    let start=$.fullCalendar.formatDate(start,'Y-MM-DD');
                    let end=$.fullCalendar.formatDate(end,'Y-MM-DD');
                    $.ajax({
                        url:BASE_URL+'calendarController/create',
                        data:{
                            title: title,
                            start:start,
                            end:end
                        },
                        type:'POST',
                        success:(data)=>{
                            toastrMessage('Event created successfully')

                            calendar.fullCalendar('renderEvent',{
                                id:data.id,
                                title:title,
                                start:start,
                                end:end,
                                allDay:allDay
                            },true);
                            calendar.fullCalendar('unselect');
                        }
                    });
                }},
                eventDrop: (event,delta)=>{
                // let start=$.fullCalendar.formatDate(event.start,'Y-MM-DD');
                let start=$.fullCalendar.formatDate(event.start,'Y-MM-DD');

                $.ajax({
                    url:BASE_URL+'/home/update/'+event.id,
                    data:{
                        title:event.title,
                        start:start,
                        end:end,
                        id:event.id
                    },
                    type:'POST',
                    success:(data)=>{
                        toastrMessage("Event updated successfully")
                    }
                });
                },
                eventClick: (event)=>{
                let questionDelete=confirm('¿Desea eliminar el evento?');

                if(questionDelete){
                    $.ajax({
                        url:BASE_URL+'calendarController/delete'+event.id,
                        data:{
                            id:event.id,
                        },
                        type:'POST',
                        success:(data)=>{
            
                            calendar.fullCalendar('removeEvent',event.id)
                           
                            calendar.fullCalendar('unselect');
                            toastrMessage('Event removed successfully');
                        }
                    });
                }
            }
        });  
    });
    function toastrMessage(params) {
        toastr.success(params,'Event');
    }
</script>
</html>