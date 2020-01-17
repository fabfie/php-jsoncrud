
class Shelf {
    constructor(id, xPos, yPos, width, height, text = "", offsetPos = "10", fillColor = "#FFF", strokeColor = "#000", strokeColor = ".2") {
        this.id = id;
        this.quantity = "";
        this.text = text.length == 0 && this.quantity.length == 0 ?
            "" :
            text + " " + this.quantity;
        this.fillColor = fillColor;
        this.strokeColor = strokeColor;
        this.strokeWidth = strokeWidth;
        this.offsetPos = offsetPos;
        this.xPos = xPos;
        this.yPos = yPos;
        this.width = width;
        this.height = height;

        this.getHTML = function () {
            return `
                <rect 
                    data-id="${this.id}" 
                    x="${this.xPos + this.offsetPos}" 
                    y="${this.yPos + this.offsetPos}" 
                    width="${this.width}" 
                    height="${this.height}" 
                    style="
                        fill:${this.fillColor};
                        stroke-width:${this.strokeWidth};
                        stroke:${this.strokeColor}
                    "
                />`;
        }

        this.getHTML();
    }
}

class Shelves {
    constructor(objectArray) {
        for (var index in objectArray) {
            console.log(objectArray);
        }
    }
}

var width = 80;

var shelves = [
    new Shelf(0, 0, 0, width, 11.5),
    new Shelf(1, 0, 11.5, width, 11.5),
    new Shelf(2, 0, 23, width, 11.5),
    new Shelf(3, 0, 34.5, width, 11.5),
    new Shelf(4, 0, 46, width, 11.5),
    new Shelf(5, 0, 57.5, width, 17),
    new Shelf(6, 0, 74.5, width, 17),
    new Shelf(7, 0, 91.5, width, 11.5),
    new Shelf(8, 0, 103, width, 11.5),
    new Shelf(9, 0, 114.5, width, 11.5),
    new Shelf(10, 0, 126, width, 11.5),
    new Shelf(11, 0, 137, width, 17)
];

class Rack {
    constructor(shelves) {
        this.addShelf = function () {

        }
    }
}

function drawRacks(racks) {

}