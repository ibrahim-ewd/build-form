const elementsBuild = () => {


    this.buildElementForm = (elements) => {
        const titleCollaps = {
            "Champ_preconfigures": "Champ préconfigurés",
            "Champs_Standards": "Champs standards",
            "Mise_en_form": "Mise en form"
        }
        return new Promise((resolve, reject) => {


            let elementGroup = "";

            $.each(elements, (index, fields) => {
                let btnElement = ""
                $.each(fields, (position, btn) => {

                    btnElement += `

                                            <button class="btn btn-outline-secondary w-100 mb-3 btn-drag" data-type="${index}" data-name="${position}"
                                                    draggable="true">
                                                ${btn['name']}
                                            </button>`
                })


                elementGroup += `
            <div class="accordion accordion-toggle-arrow" id="field-${index}" data-name="${index}">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title collapsed" data-toggle="collapse"
                                             data-target="#collapseOne${index}" aria-expanded="false">
                                            ${titleCollaps[index]}
                                        </div>
                                    </div>
                                    <div id="collapseOne${index}" class="collapse" data-parent="#accordionExample1" style="">
                                        <div class="card-body">
                                            <div class="example-tools" id="elements">
                                                        ${btnElement}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
            `;
            })
            $('#accordionExample').html(`<div id="accordionExample1">${elementGroup}</div>`)
            resolve(true)
        })

    }

    // Champs for Building Form
    this.buildSelect = (elements, attr) => {
        const req = (elements['display_labels'] == false && attr.required == true) ? "*" : '';
        let htmlOption = "";
        let dataPlaceholder = "";

        if (attr.placeholder !== '') {
            htmlOption = `<option></option>`
            dataPlaceholder = `data-placeholder="${attr.placeholder} ${req}"`;
        }
        $.each(attr.options, (elementKey, elementValue) => {
            let imgOption = ""

            if (elementValue["img"] && elementValue["img"]["src"] !== "") {

                imgOption = `src = "${elementValue["img"]["src"]}"`;
            }
            htmlOption += `<option value="${(elementValue["value"] !== "") ? elementValue["value"] : ""}" ${imgOption}>${elementValue["title"]}</option>`
        })


        return `<select type="${attr.type}"
                                     ${dataPlaceholder}
                                     ${attr.required ? 'required' : ''}
                                     ${attr.readonly ? 'readonly' : ''}
                                     name="${attr.name}"
                                      value="${attr.value}" style="${attr.style}" class="myInputs select2 ${attr.class}" id="${attr.id}_${elements['id']}">
                                      ${htmlOption}
                                      </select>`;
    }


    this.buildText = (elements, attr) => {
        const req = (elements['display_labels'] === false && attr.required === true) ? "*" : '';
        return `<input type="${attr.type}"
                                     ${attr.required ? 'required' : ''}
                                     ${attr.readonly ? 'readonly' : ''}
                                     placeholder="${attr.placeholder} ${req}"
                                     name="${attr.name}"
                                     data-condition="${attr.type_tele ? attr.type_tele : ''}"
                                     value="${attr.value}"
                                     style="${attr.style}"
                                     class="myInputs ${attr.class}"
                                     id="${attr.id}_${elements['id']}">
                                   `;
    }

    this.buildSeparator = (elements, attr) => {

        return `<div class="separator separator-solid my-7" style="${attr.style}"></div>`;
    }

    this.buildSubmit = (elements, attr) => {
        return `   <button type="${attr.type}" style="${attr.style}" class="${attr.class}  envoyer-button">${attr.content}</button>`;
    }


    this.buildParagraph = (elements, attr) => {
        return `<div style="${attr.style}" class="${attr.class}" id="${attr.id}_${elements['id']}">
                                    ${attr.content}  </div> `;
    }


    this.buildTextArea = (elements, attr) => {
        const req = (elements['display_labels'] === false && attr.required === true) ? "*" : '';

        return `<textarea type="${attr.type}"
                 ${attr.required ? 'required' : ''}
                 ${attr.readonly ? 'readonly' : ''}
                 name="${attr.name}"
                 placeholder="${attr.placeholder} ${req}"
                 style="${attr.style}"
                 class="${attr.class} myInputs "
                 id="${attr.id}_${elements['id']}">${attr.value}</textarea>`;
    }


    this.buildCheckbox = (elements, attr) => {
        let checkHtml = "";

        $.each(attr.options, (index, element) => {

            let positionLabel = attr.position_label ? attr.position_label : "position-right"
            if (element["img"] && element["img"]["src"] !== "") {
                let $image = hostName + "/storage/" + element["img"]["src"]
                let position = element["img"]['position'] ? element["img"]['position'] : "picture-left"


                checkHtml += `
                <span class="check-list-item-img col-4 d-flex align-items-center ">
                <label for="${attr.id + elements['id'] + index}" class="cursor-pointer  ${position}">
                    <input type="${attr.type}" id="${attr.id + elements['id'] + index}"
                                    ${attr.required ? 'required' : ''}
                                    ${attr.readonly ? 'readonly' : ''}
                                    name="${attr.name}"
                                    class="${attr.class} myInputs"
                                    value="${element.value}"/>
                    <label for="${attr.id + elements['id'] + index}" class="${element["img"]['size'] ? element["img"]['size'] : " picture-sm"} image-item-checkbox" style="background-image: url(${$image})">

                    </label>
                    <label class="mx-0" for="${attr.id + elements['id'] + index}">${element.title}</label>
                    </label>
                  </span>
                `;

            } else {
                checkHtml += `

                    <span class="check-list-item col-4 d-flex align-items-center">

                    <label for="${attr.id + elements['id'] + index}" class="checkbox ${positionLabel}  checkbox-outline checkbox-lg checkbox-success ">
                        <input type="${attr.type}"   ${attr.required ? 'required' : ''}
                                 ${attr.readonly ? 'readonly' : ''}
                                 value="${element.value}"
                                 name="${attr.name}"
                                 style="${attr.style}" class="${attr.class} myInputs" id="${attr.id + elements['id'] + index}">
                        <span></span>
                        <label class="mx-2">${element.title}</label>

                    </label>

                    </span>`;
            }
        })

        return `<div class="check-list-warp row">${checkHtml}</div>`;
    }

    this.buildPrivacyPolicy = (elements, attr) => {
        const req = (elements['display_labels'] === false && attr.required === true) ? "*" : '';

        let checkHtml = `
                    <span class=" col-12 d-flex ">
                        <label for="${attr.id + elements['id']}" class="checkbox checkbox-outline checkbox-lg position-right align-items-start checkbox-success">
                                  <input type="checkbox"   ${attr.required ? 'required' : ''}
                                         value=""
                                         name="${attr.name}"
                                         style="" class="myInputs" id="${attr.id + elements['id']}">
                                <span></span>
                                <label for="${attr.id + elements['id']}"  class="cursor-pointer mx-2">${attr.value}${req}</label>
                        </label>

                    </span>`;

        return `<div class="check-list-warp row">${checkHtml}</div>`;
    }


    this.buildRadioInput = (elements, attr) => {
        let checkHtml = "";
        $.each(attr.options, (index, element) => {

            let positionLabel = attr.position_label ?? "position-right"
            if (element["img"] && element["img"]["src"] !== "") {
                let $image = hostName + "/storage/" + element["img"]["src"]
                let position = element["img"]['position'] ?? ""

                checkHtml += `
                <span class="check-list-item-img col-4 d-flex align-items-center">
                    <label for="${attr.id + elements['id'] + index}" class="cursor-pointer  ${position}">

                        <input type="${attr.type}" id="${attr.id + elements['id'] + index}"
                                        ${attr.required ? 'required' : ''}
                                        ${attr.readonly ? 'readonly' : ''}
                                            name="${attr.name}"
                                        value="${element.value}"/>
    <!--                    <label for="${attr.id + elements['id'] + index}">-->
                        <label for="${attr.id + elements['id'] + index}" class="${element["img"]['size'] ?? " picture-sm"} image-item-checkbox" style="background-image: url(${$image})">
    <!--                    <img src="" class="image-item-checkbox" />-->

                        </label>
                        <label class="mx-2" for="${attr.id + elements['id'] + index}">${element.title}</label>
                    </label>
                  </span>
                `;

            } else {
                checkHtml += `
                    <span class="check-list-item col-4 d-flex align-items-center">
                        <label for="${attr.id + elements['id'] + index}" class="radio ${positionLabel} radio-outline radio-success">
                            <input type="radio"  ${attr.required ? 'required' : ''}
                                 ${attr.readonly ? 'readonly' : ''}
                                 value="${element.value}"
                                 name="${attr.name}"
                                 style="${attr.style}" class="${attr.class}" id="${attr.id + elements['id'] + index}"/>
                            <span></span>
                            <label for="${attr.id + elements['id'] + index}" class="mx-2">${element.title}</label>

                        </label>

                    </span>`;
            }
        })
        return `<div class="check-list-warp row">${checkHtml}</div>`;
    }


    this.buildMedias = (elements, attr) => {
        let checkHtml = "";
        let position = "start";

        $.each(attr.medias, (index, element) => {

            let $image = hostName + "/media/svg/social-icons/" + element['icon'] + ".svg"
            position = element['position'] ? element['position'] : "start"
            checkHtml += ` <div class="symbol  symbol-${attr.size} mr-5">
                              <a href="${element['link']}" target="${attr['target'] ? attr['target'] : "_blank"}" title="${element['icon']}">
                                   <div class="symbol-label" style="background-image: url('${$image}')"></div>
                              </a>
                       </div>`;

        })

        return `<div class="check-list-warp row">
                    <div class="wrap-symbol-media justify-content-${attr.position ? attr.position : "start"}">
                        <div class="symbol-list d-flex flex-wrap  ">
                            ${checkHtml}
                        </div>
                    </div>
                </div>`;
    }

    this.buildDate = (elements, attr) => {
        let buildInput = "";
        const req = (elements['display_labels'] === false && attr.required === true) ? "*" : '';

        if (attr.type === "time") {
            buildInput += `	<div class=" col-12 timepicker12 " >
                                    <div class="input-group ">
                                        <input class="${attr.class} myInputs form-control timepicker kt_timepicker" data-format="12"
                                                 ${attr.required ? 'required' : ''}
                                                 ${attr.readonly ? 'readonly' : ''}
                                                 id="${attr.id}_${elements['id']}"
                                                 name="${attr.name}"
                                                 placeholder="Sélectionnez l'heure ${req}" type="text"/>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="la la-clock-o"></i></span>
                                        </div>
                                    </div>
                                </div>`
        } else {
            if (attr.field_type_date === "picker") {
                buildInput += `<div class=" row">
                                    <div class="col-12">
                                     <div class="input-group date">
                                          <input type="text" data-format="${attr.format_date}"
                                            ${attr.required ? 'required' : ''}
                                            ${attr.readonly ? 'readonly' : ''}
                                            name="${attr.name}"
                                            id="${attr.id}_${elements['id']}"
                                            class="${attr.class} myInputs datepicker date_picker_class form-control"
                                          placeholder="Sélectionnez la date  ${req}"/>
                                          <div class="input-group-append">
                                           <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                           </span>
                                          </div>
                                    </div>
                                    </div>
                               </div>`
            } else if (attr.field_type_date === "typing") {
                buildInput += `<div class="row">
                                    <div class="col-12">
                                     <div class="input-group date">
                                          <input type="text" data-format="${attr.format_date}"
                                            ${attr.required ? 'required' : ''}
                                            ${attr.readonly ? 'readonly' : ''}
                                            name="${attr.name}"
                                            id="${attr.id}_${elements['id']}"
                                            class="${attr.class}  kt_inputmask date_picker_class form-control"
                                            placeholder="Sélectionnez la date"/>
                                          <div class="input-group-append">
                                           <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                           </span>
                                          </div>
                                    </div>
                                    </div>
                               </div>`
            } else {

                buildInput += `  <div class="select-group-3 select_datebuild row m-auto select_datebuildEmptyBeforeSubmit d-flex justify-content-between ">
                                    <select class="myInputs  dropdown-date-selected form-control col-4 select2" name="dateDropDown[day]" data-placeholder="Day ${req}" ${attr.required ? 'required' : ''} id="date">

                                        </select>
                                    <select class="myInputs  dropdown-date-selected form-control col-4 select2" data-placeholder="Month ${req}" ${attr.required ? 'required' : ''}
                                            name="dateDropDown[month]" id="month">

                                        </select>
                                    <select class="myInputs  dropdown-date-selected form-control col-4 select2" name="dateDropDown[year]" id="year" data-placeholder="year ${req}" ${attr.required ? 'required' : ''}>

                                        </select>
                                    <input type="hidden" class=" form-control col-4" data-name="${attr.name}" value="${attr.format_date}" name="joined" />
                                  </div>`

            }
        }
        return buildInput;
    }

    this.buildTime = (attr) => {
        return `<input type="${attr.type}"
                                     ${attr.required ? 'required' : ''}
                                     ${attr.readonly ? 'readonly' : ''}
                                     data-format=" ${attr.format_date ? attr.format_date : ''}"
                                     placeholder="${attr.placeholder}" value="${attr.value}" style="${attr.style}" class="${attr.class}" id="${attr.id}">
                                   `;
    }


    const buildSatisfactionStars = (starts, index = 0, attr) => {
        let listStarsHtml = `
           <input type="radio" data-type="star" id="radio0_${index}"
                               value="star/0/5" class="d-none"
                               name="${attr.name}" checked>
        `;


        for (let i = 1; i <= starts.number; i++) {
            listStarsHtml += `
                        <span class="itemStarsRating itemsStarsremovecolor mr-2">
                            <label for="radio${i}_${index}" class="cursor-pointer starsRatings">
                                <i data-order="${i}" data-index="${index}" class="fa fa-star cursor-pointer emojy-form emojy_form_star  icon-${starts.size ? starts.size : "2"} "></i>

                                <input type="radio" data-type="star" id="radio${i}_${index}"
                               value="star/${i}/${starts.number}" class="d-none myInput_Statisfaction"
                               name="${attr.name}">
                            </label>
                          </span>
                        `;
        }
        return `<div class="justify-content-${starts.position ? starts.position : "start"}  check-list-warp row m-auto">
                    <div class=" listStarsRating">${listStarsHtml}</div>
                </div>`;
    }

    const buildSatisfactionEmoji = (options, attr, elements) => {
        let checkHtml = "";
        let listOptionHtml = "";
        $.each(options, (index, element) => {
            let vl = (attr.satisfaction_type === "buttons") ? "default/" + element.value : element.value
            let $image = hostName + "/storage/" + element["img"]["src"]
            let position = element["img"]['position'] ? element["img"]['position'] : ""
            let iconemoji = (attr.satisfaction_type === "emoji") ? "emojiIconBAckground" : "";

            listOptionHtml += `

                        <span class="check-list-item-img itemRating ${position}">
                            <label for="${attr.id + elements['id'] + index}" class="cursor-pointer  ${position}">
                                <input type="radio" id="${attr.id + elements['id'] + index}"
                                                ${attr.required ? 'required' : ''}
                                                ${attr.readonly ? 'readonly' : ''}
                                                name="${attr.name}"
                                                value="${vl}"/>

                                <label  for="${attr.id + elements['id'] + index}" class="${iconemoji} ${element["img"]['size'] ? element["img"]['size'] : " picture-sm"} image-item-checkbox" style="background-image: url(${$image})">
                                </label>
                                <label class="mx-0" for="${attr.id + elements['id'] + index}">${element.title}</label>
                            </label>
                          </span>
                `;
            checkHtml = `<div class="justify-content-${attr.emoji.position ? attr.emoji.position : "start"} listStarsRating">${listOptionHtml}</div>`;
        })

        return `<div class="justify-content-${attr.emoji.position ? attr.emoji.position : "start"}  check-list-warp row">${checkHtml}</div>`;

    }

    const buildSatisfactionText = (options, attr, elements) => {
        let checkHtml = "";
        let listOptionHtml = ``;
        $.each(options, (index, element) => {
            let vl = (attr.satisfaction_type === "buttons") ? "default/" + element.value : element.value
            let position = element["img"]['position'] ? element["img"]['position'] : "picture-left"
            let $image = hostName + "/storage/" + element["img"]["src"]

            listOptionHtml += `
                         <span class="check-list-item-img itemRating ${position}">
                            <label for="${attr.id + elements['id'] + index}" class="cursor-pointer  ${position}">
                                <input type="radio" id="${attr.id + elements['id'] + index}"
                                                ${attr.required ? 'required' : ''}
                                                ${attr.readonly ? 'readonly' : ''}
                                                name="${attr.name}"

                                                class="d-none"
                                                value="${vl}"/>

                              <span for="${attr.id + elements['id'] + index}" class="${element["img"]['size'] ? element["img"]['size'] : " picture-sm"} image-item-checkbox" style="background-image: url(${$image})">
                                </span>
                                <span class="mx-0 labelCheck" for="${attr.id + elements['id'] + index}">${element.title}</span>
                            </label>
                          </span>
                `;
            checkHtml = `<div style="${attr.style}" class="justify-content-${attr.emoji.position ? attr.emoji.position : "start"} flex-${attr.direction ? attr.direction : "row"} listStarsRating">${listOptionHtml}</div>`;
        })

        return `<div class="justify-content-${attr.stars.position ? attr.stars.position : "start"}  check-list-warp ">${checkHtml}</div>`;
    }


    this.buildSatisfaction = (elements, attr, index) => {

        switch (attr.satisfaction_type) {
            case "emoji":
                return buildSatisfactionEmoji(attr.emoji.data, attr, elements);
                break;
            case "stars":
                return buildSatisfactionStars(attr.stars, index, attr)
                break;
            case "text":
                return buildSatisfactionText(attr.options, attr, elements)
                break;
            default:
                return "---";
                break;
        }
    }


    this.buildImportFile = (elements, attr) => {

        return `<div class="dropzone  myInputs myInputs_importFile  " id="wf_upload_file" data-title="${attr.name}">
                        <label for="id_files_upload_wf" class="class_label_files_upload_wf d-flex align-items-center flex-column" >
                          <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Déposez les fichiers ici ou cliquez pour télécharger.</h3>
                          <span class="fs-7 fw-bold text-gray-400">Téléchargez jusqu'à ${attr.number_file} fichiers </span>
                          <input type="file" name="files[]"
                                 class="wf_upload_file_input d-none myInputs "
                                 id="id_files_upload_wf" multiple
                                 accept="${attr.extensions}"
                                 data-title="${attr.name}"
                                 data-length="${attr.number_file}"
                                 data-size="${attr.maxSize}"
                                 data-extension="${attr.extensions}">
                        </label >
                    </div>`;
    }

    this.builRrecaptcha = (elements, attr) => {
        let checkHtml = "";
        let options = "options"
        console.log(attr)
        return `  <div
                    class="h-captcha"
                        data-sitekey="${attr.data_sitekey}"
                        data-theme="dark"
                        data-error-callback="onError"
                            ></div>`;
    }

    this.buildSignature = (elements, attr) => {
        let checkHtml = "";
        let options = "options"

        return `
            <div class="row w-100">
                <div class="form-group  mb-1 col-12  child_signature" id="signature">
                      <div id="sig" class="sig" style=" min-height:100px;width: 100% !important; border: 1px solid;"></div>
                      <textarea id="signatureArea" class="signatureArea" name="${attr.name}" style="display: none"></textarea>
                 </div>
                 <div id="clear" class="ml-4  ">claire</div>
            </div>
`;
    }

    return {
        buildSelect: function (elements, attr) {
            return buildSelect(elements, attr);
        },
        buildText: function (elements, attr) {
            return buildText(elements, attr);
        },
        buildParagraph: function (elements, attr) {
            return buildParagraph(elements, attr);
        },
        buildTextArea: function (elements, attr) {
            return buildTextArea(elements, attr);
        },
        buildCheckbox: function (elements, attr) {
            return buildCheckbox(elements, attr);
        },
        buildPrivacyPolicy: function (elements, attr) {
            return buildPrivacyPolicy(elements, attr);
        },
        buildRadioInput: function (elements, attr) {
            return buildRadioInput(elements, attr);
        },
        buildMedias: function (elements, attr) {
            return buildMedias(elements, attr);
        },
        buildSatisfaction: function (elements, attr, index) {
            return buildSatisfaction(elements, attr, index);
        },
        buildImportFile: function (elements, attr) {
            return buildImportFile(elements, attr);
        },
        builRrecaptcha: function (elements, attr) {
            return builRrecaptcha(elements, attr);
        },
        buildSignature: function (elements, attr) {
            return buildSignature(elements, attr);
        },
        buildDate: function (elements, attr) {
            return buildDate(elements, attr);
        },
        buildElementForm: function (elements) {
            return buildElementForm(elements);
        },
        buildSeparator: function (elements, attr) {
            return buildSeparator(elements, attr);
        },
        buildSubmit: function (elements, attr) {
            return buildSubmit(elements, attr);
        },

    }

}
