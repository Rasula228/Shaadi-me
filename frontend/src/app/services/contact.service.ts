import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ContactService {
  private apiUrl = '/api/contacts';

  constructor(private http: HttpClient) {}

  getAllContacts(): Observable<any> {
    return this.http.get(this.apiUrl);
  }

  getContactById(id: number): Observable<any> {
    return this.http.get(`${this.apiUrl}/${id}`);
  }

  submitContact(data: any): Observable<any> {
    return this.http.post(this.apiUrl, data);
  }

  updateContact(id: number, data: any): Observable<any> {
    return this.http.put(`${this.apiUrl}/${id}`, data);
  }

  deleteContact(id: number): Observable<any> {
    return this.http.delete(`${this.apiUrl}/${id}`);
  }

  checkContactList(userId: number): Observable<any> {
    return this.http.get(`${this.apiUrl}/check/${userId}`);
  }
}