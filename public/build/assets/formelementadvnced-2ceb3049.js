(function(){new Dropzone(".dropzone").on("addedfile",e=>{});const a=document.querySelector(".multiple-filepond");FilePond.create(a),FilePond.create(document.querySelector(".single-fileupload"),{labelIdle:'Drag & Drop your picture or <span class="filepond--label-action">Browse</span>',imagePreviewHeight:170,imageCropAspectRatio:"1:1",imageResizeTargetWidth:200,imageResizeTargetHeight:200,stylePanelLayout:"compact circle",styleLoadIndicatorPosition:"center bottom",styleButtonRemoveItemPosition:"center bottom"}),flatpickr("#date",{}),flatpickr("#daterange",{mode:"range",dateFormat:"Y-m-d"}),flatpickr("#timepikcr",{enableTime:!0,noCalendar:!0,dateFormat:"H:i"}),flatpickr("#timepickr1",{enableTime:!0,noCalendar:!0,dateFormat:"H:i",time_24hr:!0}),flatpickr("#limittime",{enableTime:!0,noCalendar:!0,dateFormat:"H:i",minTime:"16:00",maxTime:"22:30"}),flatpickr("#limitdatetime",{enableTime:!0,minTime:"16:00",maxTime:"22:00"}),new Choices("#choices-multiple-default",{allowSearch:!1}).setValue(["Choice 2","Choice 3"]),new Choices("#choices-multiple-remove-button",{allowHTML:!0,removeItemButton:!0}),new Choices(document.getElementById("choices-multiple-groups"),{allowHTML:!0}),new Choices("#choices-text-email-filter",{allowHTML:!0,editItems:!0,addItemFilter:function(e){if(!e)return!1;const l=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;return new RegExp(l.source,"i").test(e)}}).setValue(["abc@hotmail.com"]),new Choices("#choices-text-preset-values",{allowHTML:!0,items:["one",{value:"two",label:"two",customProperties:{description:"Numbers are infinite"}}]}),new Choices("#choices-single-no-search",{allowHTML:!0,searchEnabled:!1,removeItemButton:!0,choices:[{value:"One",label:"Label One"},{value:"Two",label:"Label Two"},{value:"Three",label:"Label Three"}]}).setChoices([{value:"Four",label:"Label Four"},{value:"Five",label:"Label Five"},{value:"Six",label:"Label Six",selected:!0}],"value","label",!1),new Choices("#choices-text-unique-values",{allowHTML:!0,paste:!1,duplicateItemsAllowed:!1,editItems:!0}),document.addEventListener("DOMContentLoaded",function(){var e=document.querySelectorAll("[data-trigger]");for(let t=0;t<e.length;++t){var l=e[t];new Choices(l,{allowHTML:!0,placeholderValue:"This is a placeholder set in the config",searchPlaceholderValue:"Search"})}})})();
