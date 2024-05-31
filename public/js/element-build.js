const elementsBuild = () => {


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
                                      value="${attr.value}" style="${attr.style}" class="select2 ${attr.class}" id="${attr.id}_${elements['id']}">
                                      ${htmlOption}
                                      </select>`;
    }


    this.buildText = (elements, attr) => {
        const req = (elements['display_labels'] == false && attr.required == true) ? "*" : '';

        return `<input type="${attr.type}"
                                     ${attr.required ? 'required' : ''}
                                     ${attr.readonly ? 'readonly' : ''}
                                     placeholder="${attr.placeholder} ${req}" value="${attr.value}" style="${attr.style}" class="${attr.class}" id="${attr.id}_${elements['id']}">
                                   `;
    }


    this.buildParagraph = (elements, attr) => {
        return `<div style="${attr.style}" class="${attr.class}" id="${attr.id}_${elements['id']}">
                                    ${attr.value}  </div> `;
    }


    this.buildTextArea = (elements, attr) => {
        return `<textarea type="${attr.type}"
                 ${attr.required ? 'required' : ''}
                 ${attr.readonly ? 'readonly' : ''}
                 placeholder="${attr.placeholder}"
                 style="${attr.style}" class="${attr.class}" id="${attr.id}_${elements['id']}">${attr.value}</textarea>`;
        ;
    }


    this.buildCheckbox = (elements, attr) => {
        let checkHtml = "";
        $.each(attr.options, (index, element) => {
            if (element["img"] && element["img"]["src"] !== "") {
                let $image = hostName + "/storage/" + element["img"]["src"]
                let position = element["img"]['position'] ?? ""
                checkHtml += `
                <span class="check-list-item-img col-4 d-flex align-items-center ${position}">
                    <input type="${attr.type}" id="${attr.id + elements['id'] + index}"
                                    ${attr.required ? 'required' : ''}
                                    ${attr.readonly ? 'readonly' : ''}
                                    value="${element.value}"/>
                    <label for="${attr.id + elements['id'] + index}" class="${element["img"]['size']} image-item-checkbox" style="background-image: url(${$image})">

                    </label>
                    <label class="mx-0" for="${attr.id + elements['id'] + index}">${element.title}</label>
                  </span>
                `;

            } else {
                checkHtml += `
                    <span class="check-list-item col-4 d-flex align-items-center">
                        <label for="${attr.id + elements['id'] + index}" class="cursor-pointer">
                            <input type="${attr.type}"
                                 ${attr.required ? 'required' : ''}
                                 ${attr.readonly ? 'readonly' : ''}
                                 value="${element.value}"
                                 name="${element.value}"
                                 style="${attr.style}" class="${attr.class}" id="${attr.id + elements['id'] + index}" />
                            <span class="mx-2">${element.title}</span>
                        </label>
                    </span>`;
            }
        })
        return `<div class="check-list-warp row">${checkHtml}</div>`;
    }


    this.buildRadioInput = (elements, attr) => {
        let checkHtml = "";
        $.each(attr.options, (index, element) => {
            if (element["img"] && element["img"]["src"] !== "") {
                let $image = hostName + "/storage/" + element["img"]["src"]
                let position = element["img"]['position'] ?? ""
                checkHtml += `
                <span class="check-list-item-img col-4 d-flex align-items-center  ${position}">
                    <input type="${attr.type}" id="${attr.id + elements['id'] + index}"
                                    ${attr.required ? 'required' : ''}
                                    ${attr.readonly ? 'readonly' : ''}
                                        name="${attr.name}_${elements['id']}"
                                    value="${element.value}"/>
<!--                    <label for="${attr.id + elements['id'] + index}">-->
                    <label for="${attr.id + elements['id'] + index}" class="${element["img"]['size']} image-item-checkbox" style="background-image: url(${$image})">
<!--                    <img src="" class="image-item-checkbox" />-->

                    </label>
                    <label class="mx-2" for="${attr.id + elements['id'] + index}">${element.title}</label>
                  </span>
                `;

            } else {
                checkHtml += `
                    <span class="check-list-item col-4 d-flex align-items-center">
                        <label for="${attr.id + elements['id'] + index}" class="cursor-pointer">
                            <input type="${attr.type}"
                                 ${attr.required ? 'required' : ''}
                                 ${attr.readonly ? 'readonly' : ''}
                                 value="${element.value}"
                                 name="${attr.name}_${elements['id']}"
                                 style="${attr.style}" class="${attr.class}" id="${attr.id + elements['id'] + index}" />
                            <span class="mx-2">${element.title}</span>
                        </label>
                    </span>`;
            }
        })
        return `<div class="check-list-warp row">${checkHtml}</div>`;
    }

    this.buildDate = (elements, attr) => {
        let buildInput = "";

        const _input = `<input type="text"
                                     ${attr.required ? 'required' : ''}
                                     ${attr.readonly ? 'readonly' : ''}
                                     data-format=" ${attr.format_date ?? ''}"

                                     placeholder="${attr.placeholder}" value="${attr.value}" style="${attr.style}" class="${attr.class}" id="${attr.id}_${elements['id']}">
                                   `;

        if (attr.type == "time") {
            buildInput += `	<div class="input-group timepicker">
                                ${_input}
                                    <span class="input-group-addon"> <span class="fa fa-clock-o"></span> </span>

                              </div>`
        } else {
            buildInput += `<div class="input-group date datepicker">
                                    ${_input}
                                 <span class="input-group-addon"> <span class="fa fa-clock-o"></span> </span>

                              </div>`
        }
        return buildInput;
    }

    this.buildTime = (attr) => {
        return `<input type="${attr.type}"
                                     ${attr.required ? 'required' : ''}
                                     ${attr.readonly ? 'readonly' : ''}
                                     data-format=" ${attr.format_date ?? ''}"
                                     placeholder="${attr.placeholder}" value="${attr.value}" style="${attr.style}" class="${attr.class}" id="${attr.id}">
                                   `;
    }

    this.buildSatisfaction = (elements, attr) => {
        let checkHtml = "";

        $.each(attr.options, (index, element) => {
            let $image = hostName + "/storage/" + element["img"]["src"]
            let position = element["img"]['position'] ?? ""
            if (element["img"] && element["img"]["src"] !== "") {

                checkHtml += `
                <span class="check-list-item-img col d-flex align-items-center ${position}">
                    <input type="checkbox" id="${attr.id + elements['id'] + index}"
                                    ${attr.required ? 'required' : ''}
                                    ${attr.readonly ? 'readonly' : ''}
                                    value="${element.value}"/>
                    <label for="${attr.id + elements['id'] + index}" class="${element["img"]['size']} image-item-checkbox" style="background-image: url(${$image})">
                    </label>
                    <label class="mx-0" for="${attr.id + elements['id'] + index}">${element.title}</label>
                  </span>
                `;

            } else {
                checkHtml += `
                    <span class="check-list-item col d-flex align-items-center">
                        <label for="${attr.id + elements['id'] + index}" class="cursor-pointer ${position}">
                            <input type="checkbox"
                                 ${attr.required ? 'required' : ''}
                                 ${attr.readonly ? 'readonly' : ''}
                                 value="${element.value}"
                                 name="${element.value}"
                                 style="${attr.style}" class="${attr.class}" id="${attr.id + elements['id'] + index}" />
                            <span class="mx-2">${element.title}</span>
                        </label>
                    </span>`;
            }
        })
        return `<div class="check-list-warp row">${checkHtml}</div>`;
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
        buildRadioInput: function (elements, attr) {
            return buildRadioInput(elements, attr);
        },
        buildSatisfaction: function (elements, attr) {
            return buildSatisfaction(elements, attr);
        },
        buildDate: function (elements, attr) {
            return buildDate(elements, attr);
        },
    }

}
