/**
 * Created by MD AZIZUL HAKIM on 03/09/2017.
 */


//Using IIFE(Immediately Invoked Function Expression)


var BudgetController = (function () {

    var Expense = function (id, description, value) {

        this.id = id;
        this.description = description;
        this.value = value;
    };


    var Income = function (id, description, value) {

        this.id = id;
        this.description = description;
        this.value = value;
    };


    var data = {

        allItems: {
            inc: [],
            exp: []
        },

        totals: {
            exp: 0,
            inc: 0
        }

    };


    return {

        addItem: function (type, description, value) {

            var newItem, ID;

            if (data.allItems[type].length > 0) {
                //Generating New ID from Array Length
                ID = data.allItems[type][data.allItems[type].length - 1].id + 1;
            } else ID = 0;


            //Inserting Data  into array
            if (type === "inc") {
                newItem = new Income(ID, description, value);
            } else if (type === "exp") {
                newItem = new Expense(ID, description, value);
            }

            data.allItems[type].push(newItem);

            return newItem;
        },
        test: function () {
            console.log(data);
        }


    }


})();


var UIController = (function () {


    var DomStrings = {

        inputType: ".add__type",
        inputDescription: ".add__description",
        inputValues: ".add__value",

        btnAdd: ".add__btn",

        incomeContainer: ".income__list",
        expenseContainer: ".expenses__list"


    };


    return {
        getInput: function () {

            return {
                type: document.querySelector(DomStrings.inputType).value, //returns strings:inc or exp
                description: document.querySelector(DomStrings.inputDescription).value,
                value: document.querySelector(DomStrings.inputValues).value
            };

        },

        addListItems: function (obj, type) {

            var HTML, NewHTML, elements;

            if (type === 'inc') {

                elements = DomStrings.incomeContainer;
                HTML = '<div class="item clearfix" id="income-%id%"> <div class="item__description">%description%</div> ' +
                    '<div class="right clearfix"> <div class="item__value">+ %value%</div> <div class="item__delete"> ' +
                    '<button class="item__delete--btn"><i class="ion-ios-close-outline"></i></button> </div> </div> </div>';

            } else if (type === 'exp') {

                elements = DomStrings.expenseContainer;
                HTML = '<div class="item clearfix" id="expense-%id%"> <div class="item__description">%description%</div> ' +
                    '<div class="right clearfix"> <div class="item__value">- %value%</div> <div class="item__percentage">21%' +
                    '</div> <div class="item__delete"> <button class="item__delete--btn"><i class="ion-ios-close-outline"></i>' +
                    '</button> </div> </div> </div>';

            }

            //Replace TextHolders with our input
            NewHTML = HTML.replace("%id%", obj.id);
            NewHTML = NewHTML.replace("%description%", obj.description);
            NewHTML = NewHTML.replace("%value%", obj.value);

            //Insert HTML into DOM
            document.querySelector(elements).insertAdjacentHTML("beforeend", NewHTML);


        },
        getDomStrings: function () {
            return DomStrings;
        }
    };

})();


//This Function is he Global App Controller
var Controller = (function (BudgetCtrl, UiCtrl) {


    var setupEventListeners = function () {

        var DOM = UiCtrl.getDomStrings();

        var btnAdd = document.querySelector(DOM.btnAdd);

        btnAdd.addEventListener('click', ctrlAddItem);


        document.addEventListener('keypress', function (event) {

            if (event.keyCode === 13 || event.which === 13) {

                ctrlAddItem();
            }
        })

    };


    var ctrlAddItem = function () {

        var input, newItem;

        input = UiCtrl.getInput();

        newItem = BudgetCtrl.addItem(input.type, input.description, input.value);

        UiCtrl.addListItems(newItem, input.type);


    };


    return {
        init: function () {
            setupEventListeners();
        }
    };


})(BudgetController, UIController);

Controller.init();