$(".delete-btn").confirm({
    title:"Delete confirmation",
    type: "red",
    text:"Are you really really sure?",
    confirm: function(button) {
        alert("You just confirmed.");
    },
    cancel: function(button) {
        alert("You aborted the operation.");
    },
    confirmButton: "Yes I am",
    cancelButton: "No"
});