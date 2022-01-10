function deleteWork(id,name)
{
    let confirm1 = confirm(`Вы действительно хотите удалить вакансию "${name}"?`);
    if (confirm1)
        $.ajax({
            url: "/deleteWork",
            type: "POST",
            data: ({_token: $('#csrf-token')[0].content, 'workId': id}),
            dataType: "text",
            success:(data)=>{
                $(`#${id}`).remove();
            }

        });
}
function deleteResponse(id,name)
{
    let confirm1 = confirm(`Вы действительно хотите удалить отклик соискателя: "${name}"?`);
    if (confirm1)
        $.ajax({
            url: "/deleteResponse",
            type: "POST",
            data: ({_token: $('#csrf-token')[0].content, 'responseId': id}),
            dataType: "text",
            success:(data)=>{
                $(`#${id}`).remove();
            }

        });
}
