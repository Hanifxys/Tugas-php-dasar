const TicketParking = require('./state');

function ServerTicketParking() {
    this.checkAvailability = function() {
        const isParkingAvailable = TicketParking.TicketParking > 0;
        const isMotorAvailable = TicketParking.TicketMotor > 0;
        const isMobilAvailable = TicketParking.TicketMobil > 0;

        return {
            parking: isParkingAvailable,
            motor: isMotorAvailable,
            mobil: isMobilAvailable
        };
    }
}

// Example usage:
const server = new ServerTicketParking();
const availability = server.checkAvailability();
console.log(`Parking Availability: ${availability.parking}`);
console.log(`Motor Availability: ${availability.motor}`);
console.log(`Mobil Availability: ${availability.mobil}`);
