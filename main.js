function highlightRack(rackID) {
	$("#estanteria" + rackID).attr('style', 'fill:rgb(0,0,0);');
}

var customWidth = 100;

class Rack {
	constructor(width, shelves) {
		this.width = width;
	}


}

var racks = [
	new Rack(customWidth, [11, 11, 11, 11, 11, 17, 17, 11, 11, 11, 11, 17]),	// 0
	new Rack(customWidth, [12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12]),		// 1
	new Rack(customWidth, [12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12]),		// 2
	new Rack(customWidth, [33, 32, 33, 32, 22, 21]),							// 3
	new Rack(customWidth, [32, 33, 32, 33, 37]),								// 4
	new Rack(customWidth, [32, 32, 33, 33, 33]),								// 5
	new Rack(customWidth, [33, 33, 32, 33, 22, 22]),							// 6
	new Rack(customWidth, [32, 31, 32, 31, 32, 16]),							// 7
	new Rack(customWidth, [33, 32, 32, 32, 46]),								// 8
	new Rack(customWidth, [32, 37, 37, 37, 37, 22]),							// 9
	new Rack(customWidth, [33, 32, 32, 32, 22, 21]),							// 10
	new Rack(customWidth, [32, 32, 33, 33, 46]),								// 11
	new Rack(customWidth, [32, 32, 36, 31, 41]),								// 12
	new Rack(customWidth, [32, 38, 37, 42, 30]),								// 13
	new Rack(customWidth, [7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 22, 42]),		// 14
	new Rack(customWidth, [12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 21])		// 15
];
