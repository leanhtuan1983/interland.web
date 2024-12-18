function showEvent(eventNumber) {
    const events = document.querySelectorAll(".event-content");
    events.forEach((event) => {
        event.classList.remove("active");
    });
    const selectedEvent = document.getElementById(`event${eventNumber}`);
    selectedEvent.classList.add("active");
}
