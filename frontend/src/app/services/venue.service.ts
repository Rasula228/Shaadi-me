import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class VenueService {
  private apiUrl = '/api/venues';

  constructor(private http: HttpClient) {}

  getAllVenues(): Observable<any> {
    return this.http.get(this.apiUrl);
  }

  getVenueById(id: number): Observable<any> {
    return this.http.get(`${this.apiUrl}/${id}`);
  }

  getVenueTypes(): Observable<any> {
    return this.http.get(`${this.apiUrl}/types`);
  }
}
