// var DropzoneDemo={init:function(){Dropzone.options.mDropzoneOne={paramName:"file",maxFiles:1,maxFilesize:5,addRemoveLinks:!0,accept:function(e,o){"justinbieber.jpg"==e.name?o("Naha, you don't."):o()}},Dropzone.options.mDropzoneTwo={paramName:"file",maxFiles:10,maxFilesize:10,addRemoveLinks:!0,accept:function(e,o){"justinbieber.jpg"==e.name?o("Naha, you don't."):o()}},Dropzone.options.mDropzoneThree={paramName:"file",maxFiles:10,maxFilesize:10,addRemoveLinks:!0,acceptedFiles:"image/*,application/pdf,.psd",accept:function(e,o){"justinbieber.jpg"==e.name?o("Naha, you don't."):o()}}}};DropzoneDemo.init();
function removeImg(arr) {
    var what, a = arguments, L = a.length, ax;
    while (L > 1 && arr.length) {
        what = a[--L];
        while ((ax= arr.indexOf(what)) !== -1) {
            arr.splice(ax, 1);
        }
    }
    return arr;
}

function JS_ClearDropZone() {
    //DropZone Object Get
    
}
var contract1= {
        init:function() {
            var fileList = new Array;
            var fileListinput = new Array;
            var i =0;
            Dropzone.options.contract1= {
                paramName:"file",
                maxFiles:20,
                maxFilesize:20,
                acceptedFiles:".doc,.pdf,.png",
                addRemoveLinks:!0,
                accept:function(e, o) {
                    "justinbieber.jpg"==e.name?o("Naha, you don't."): o()
                },
                success:function(file, serverFileName) {
                    fileList[i] = {"serverFileName" : serverFileName, "fileName" : file.name,"fileId" : i };
                    fileListinput[i] = "public/uploads/user/contract/"+serverFileName;
                    // $('input[name="image"]').val(fileListinput[i]);
                    $('input[name="contract1"]').val(JSON.stringify(fileListinput));
                    i++;
                },
                removedfile:function(file) {
                    var path ="/public/uploads/user/contract/";
                    var rmvFile = "";
                    for(f=0;f<fileList.length;f++){
                        if(fileList[f].fileName == file.name)
                        {
                            rmvFile = fileList[f].serverFileName;
                        }
                    }
                    if (rmvFile){
                        $.ajax({
                            url: document.location.origin+"/deletefiles",
                            type: "POST",
                            data: { "fileList" : rmvFile,"path":path },
                            success: function(data) {
                                removeImg(fileListinput, rmvFile);
                                $('input[name="contract1"]').val(JSON.stringify(fileListinput));
                                $(document).find(file.previewElement).remove();
                                i--;
                            }
                        });
                    }
                },
            }
          
        }
    }
    ;

var contract2= {
        init:function() {
            var fileList = new Array;
            var fileListinput = new Array;
            var i =0;
            Dropzone.options.contract2= {
                paramName:"file",
                maxFiles:20,
                maxFilesize:20,
                acceptedFiles:".doc,.pdf,.png",
                addRemoveLinks:!0,
                accept:function(e, o) {
                    "justinbieber.jpg"==e.name?o("Naha, you don't."): o()
                },
                success:function(file, serverFileName) {
                    fileList[i] = {"serverFileName" : serverFileName, "fileName" : file.name,"fileId" : i };
                    fileListinput[i] = "public/uploads/user/contract/"+serverFileName;
                    // $('input[name="image"]').val(fileListinput[i]);
                    $('input[name="contract2"]').val(JSON.stringify(fileListinput));
                    i++;
                },
                removedfile:function(file) {
                    var path ="/public/uploads/user/contract/";
                    var rmvFile = "";
                    for(f=0;f<fileList.length;f++){
                        if(fileList[f].fileName == file.name)
                        {
                            rmvFile = fileList[f].serverFileName;
                        }
                    }
                    if (rmvFile){
                        $.ajax({
                            url: document.location.origin+"/deletefiles",
                            type: "POST",
                            data: { "fileList" : rmvFile,"path":path },
                            success: function(data) {
                                removeImg(fileListinput, rmvFile);
                                $('input[name="contract2"]').val(JSON.stringify(fileListinput));
                                $(document).find(file.previewElement).remove();
                                i--;
                            }
                        });
                    }
                },
            }
          
        }
    }
    ;

var dropzoneupload= {
        init:function() {
            var fileList = new Array;
            var fileListinput = new Array;
            var i =0;
            Dropzone.options.dropzoneupload= {
                paramName:"file",
                maxFiles:20,
                maxFilesize:20,
                acceptedFiles:".jpeg,.jpg,.png",
                addRemoveLinks:!0,
                accept:function(e, o) {
                    "justinbieber.jpg"==e.name?o("Naha, you don't."): o()
                },
                success:function(file, serverFileName) {
                    fileList[i] = {"serverFileName" : serverFileName, "fileName" : file.name,"fileId" : i };
                    fileListinput[i] = "public/uploads/lot/"+serverFileName;
                    // $('input[name="image"]').val(fileListinput[i]);
                    $('input[name="images"]').val(JSON.stringify(fileListinput));
                    i++;
                },
                removedfile:function(file) {
                    var path ="/public/uploads/lot/";
                    var rmvFile = "";
                    for(f=0;f<fileList.length;f++){
                        if(fileList[f].fileName == file.name)
                        {
                            rmvFile = fileList[f].serverFileName;
                        }
                    }
                    if (rmvFile){
                        $.ajax({
                            url: document.location.origin+"/deletefiles",
                            type: "POST",
                            data: { "fileList" : rmvFile,"path":path },
                            success: function(data) {
                                removeImg(fileListinput, rmvFile);
                                $('input[name="images"]').val(JSON.stringify(fileListinput));
                                $(document).find(file.previewElement).remove();
                                i--;
                            }
                        });
                    }
                },
            }
          
        }
    }
    ;

var dp= {
        init:function() {
            var fileList = new Array;
            var fileListinput = new Array;
            var i =0;
            Dropzone.options.dp= {
                paramName:"file",
                maxFiles:1,
                maxFilesize:20,
                acceptedFiles:".jpg,.png,.jpeg",
                addRemoveLinks:!0,
                accept:function(e, o) {
                    "justinbieber.jpg"==e.name?o("Naha, you don't."): o()
                },
                success:function(file, serverFileName) {
                    fileList[i] = {"serverFileName" : serverFileName, "fileName" : file.name,"fileId" : i };
                    fileListinput[i] = "public/uploads/user/dp/"+serverFileName;
                   console.log(fileListinput[i]);
                    $('input[name="dp"]').val(fileListinput[i]);
                    i++;
                },
                removedfile:function(file) {
                    var path ="/public/uploads/user/dp/";
                    var rmvFile = "";
                    for(f=0;f<fileList.length;f++){
                        if(fileList[f].fileName == file.name)
                        {
                            rmvFile = fileList[f].serverFileName;
                        }
                    }
                    if (rmvFile){
                        $.ajax({
                            url: document.location.origin+"/deletefiles",
                            type: "POST",
                            data: { "fileList" : rmvFile,"path":path },
                            success: function(data) {
                                removeImg(fileListinput, rmvFile);
                                $('input[name="dp"]').val('');
                                $(document).find(file.previewElement).remove();
                                i--;
                            }
                        });
                    }
                },
            }

        }
    }
    ;

dp.init();
contract1.init();
contract2.init();
dropzoneupload.init();
