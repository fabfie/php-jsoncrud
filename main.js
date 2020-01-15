function highlightRack(rackID) {
    $("#estanteria" + rackID).attr('style', 'fill:rgb(0,0,0);');
}


class Shelf {
    constructor(id, x, y, width, height, text = "", fillColor="#FFF", strokeColor="#000", strokeColor=".2") {
        this.id = id;
        this.quantity = "";
        this.text = text.length == 0 && this.quantity.length == 0 ? 
            "" : 
            text + " " + this.quantity;
        this.fillColor = fillColor;
        this.strokeColor = strokeColor;
        this.strokeWidth = strokeWidth;
        this.x = x;
        this.y = y;
        this.width = width;
        this.height = height;

        this.getHTML = function() {
            return `
                <rect 
                    data-id="${this.id}" 
                    x="${this.x}" 
                    y="${this.y}" 
                    width="${this.width}" 
                    height="${this.height}" 
                    style="
                        fill:${this.fillColor};
                        stroke-width:${this.strokeWidth};
                        stroke:${this.strokeColor}
                    "
                />`;
        }
    }
}

class Rack {
    constructor(shelves){
        this.addShelf = function() {
            
        }
    }
}


function drawRacks(racks) {

}