import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { ContactService } from '../../services/contact.service';

@Component({
  selector: 'app-contact',
  standalone: false,
  templateUrl: './contact.component.html',
  styleUrl: './contact.component.scss'
})
export class ContactComponent {
  contactForm = {
    name: '',
    email: '',
    subject: '',
    message: ''
  };
  
  isSubmitted = false;
  isLoading = false;
  
  constructor(private contactService: ContactService) {}
  
  submitContact() {
    this.isLoading = true;
    this.contactService.submitContact(this.contactForm).subscribe({
      next: (response) => {
        console.log('Contact submitted successfully:', response);
        this.isSubmitted = true;
        this.isLoading = false;
        this.contactForm = {
          name: '',
          email: '',
          subject: '',
          message: ''
        };
      },
      error: (err) => {
        console.error('Error submitting contact:', err);
        this.isLoading = false;
        this.isSubmitted = true;
      }
    });
  }
}